<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;
use App\Models\Product;
use App\Models\ProductImages;
use App\Traits\uploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use uploadImageTrait;
    private $product;
    private $location;
    private $category;
    private $productImage;
    function __construct(Product $product , Location $location, Category $category, ProductImages $productImages)
    {
        $this->product = $product;
        $this->location = $location;
        $this->category = $category;
        $this->productImages = $productImages;
    }
    //===================== hiển thị danh sách sản phẩm=============================//
    public function index(){
        // lấy danh sách sản phẩm
        $products = $this->product->latest()->paginate(5);
        // trả về view hiển thị sản phẩm
        return view('admin.product.index',['products'=>$products]);
    }
    //====================== hàm gọi giao diện thêm sản phẩm=========================//
    public function create(){
        $locations = $this->location->get();
        $categories = $this->category->get();
        return view('admin.product.add',compact('locations','categories'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:products,name',
            'desc'=>'required|min:3',
            'price'=>'required',
            'floor_area'=>'required',
            'product_content'=>'required',
            'category_id'=>'required',
            'location_id'=>'required'
        ],[
            'name.required'=>'Tên sản phẩm không đuợc để trống!',
            'name.unique'=>'Tên sản phẩm đã tồn tại, vui lòng thử lại!',
            'desc.required'=>'Mô tả ngắn không được để trống',
            'floor_area.required'=>'Hãy nhập diện tích sàn',
            'price.required'=>'Giá tiền không được để trống',
            'product_content.required'=>'Nội dung không được để trống',
            'category_id.required'=>'Hãy chọn danh mục',
            'location_id.required'=>'Hãy chọn khu vực'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->floor_area = $request->floor_area;
        $product->content = $request->product_content;
        $product->category_id = $request->category_id;
        $product->location_id = $request->location_id;

        // lưu file ảnh vào database và thư mục
        $data_image = $this->HelperUploadImageTrait('product',$request->product_image);
        // dd($request->product_image);
        if(!empty($data_image)){
            $product->product_image = $data_image['image_name'];
            $product->product_image_path = $data_image['image_path'];
        }
        $product->save();
         // lưu file ảnh liên quan của sản phẩm vào bảng product_imagess
        //  dd($request->related_image);
        if($request->hasFile('related_image')){
            foreach($request->related_image as $item){
                $data_img =  $this->HelperUploadImageTrait('product',$item);
                // thêm các trường bảng product_images
                $product->product_images()->create([
                    'image_path'=>$data_img['image_path'],
                    'image_name'=>$data_img['image_name'],
                ]);
            }
        }

        return redirect()->route('products.create')->with('notification','Bạn đã thêm thành công !');
    }
    //=================================Xóa sản phẩm và ảnh liên quan ===================================//
    public function delete($id){
        $product = $this->product->find($id);

        // xóa ảnh đại diện trong thư mục
        unlink(public_path($product->product_image_path));

        // xóa các ảnh liên quan trong thư mục
        foreach($product->product_images as $image_pro){
            unlink(public_path($image_pro->image_path));
        }
        //xóa các trường ảnh liên quan trong product_images
        $product->product_images()->delete();

        $product->delete();
        // return redirect()->route('products.index')->with('notification','Xóa sản phẩm thành công !');
        return response()->json([
            'code' => '200',
            'status' => 'success',
        ],200);
    }
    // gọi view sửa sản phẩm
    public function edit($id){
        $product = $this->product->find($id);

        $locations = $this->location->get();
        $categories = $this->category->get();
        return view('admin.product.edit',compact('product','locations','categories'));
    }
    // POST sửa sản phẩm
    public function update(Request $request, $id){
        $this->validate($request,[
            'name'=>'required',
            'desc'=>'required|min:3',
            'price'=>'required',
            'floor_area'=>'required',
            'product_content'=>'required',
            'category_id'=>'required',
            'location_id'=>'required'
        ],[
            'name.required'=>'Tên sản phẩm không đuợc để trống!',
            'desc.required'=>'Mô tả ngắn không được để trống',
            'floor_area.required'=>'Hãy nhập diện tích sàn',
            'price.required'=>'Giá tiền không được để trống',
            'product_content.required'=>'Nội dung không được để trống',
            'category_id.required'=>'Hãy chọn danh mục',
            'location_id.required'=>'Hãy chọn khu vực'
        ]);

        $product = $this->product->find($id);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->floor_area = $request->floor_area;
        $product->content = $request->product_content;
        $product->category_id = $request->category_id;
        $product->location_id = $request->location_id;
            // kiểm tra xem có trường ảnh đại diện có giá trị hay không để thay thế ảnh đại diện
        if($request->product_image != null){
            unlink(public_path($product->product_image_path));
            $data_image = $this->HelperUploadImageTrait('product',$request->product_image);
            if(!empty($data_image)){
                $product->product_image = $data_image['image_name'];
                $product->product_image_path = $data_image['image_path'];
            }
        }
        $product->save();
        // nếu trường ảnh chi tiết tồn tại file thì thêm mới vào bảng ProductImages
        if($request->hasFile('related_image')){
            foreach($request->related_image as $item){
                $data_image_2 = $this->HelperUploadImageTrait('product',$item);
                $imagePro = new ProductImages();
                $imagePro->image_name = $data_image_2['image_name'];
                $imagePro->image_path = $data_image_2['image_path'];
                $imagePro->product_id = $product->id;
                $imagePro->save();
            }
        }
        return redirect()->route('products.edit',['id'=> $id])->with('notification','Sửa sản phẩm thành công !');
    }
    // xóa ảnh chi tiết của sản phẩm
    public function deleteImagePro($id){

        $ImagePro = $this->productImages->find($id);

        unlink(public_path($ImagePro->image_path));
        $ImagePro->delete();

        return redirect()->route('products.edit',['id'=> $ImagePro->product_id])->with('notification','Đã xóa 1 ảnh chi tiết !');
    }

}
