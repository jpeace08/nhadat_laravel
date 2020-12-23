<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Traits\uploadImageTrait;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    use uploadImageTrait;
    private $slider;
    function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index(){
        $sliders= $this->slider->paginate(10);
        return view('admin.slider.index',compact('sliders'));
    }
    // trả về view thêm slider
    public function create(){
        return view ('admin.slider.add');
    }
    // nhận và lưu dữ liệu
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:sliders,name',
            'desc'=>'required|min:3',
            'slider_image'=>'required'
        ],[
            'name.required'=>'Tên slider không đuợc để trống!',
            'name.unique'=>'Tên sản phẩm đã tồn tại, vui lòng thử lại!',
            'desc.required'=>'Mô tả ngắn không được để trống',
            'slider_image.required'=>'Hình ảnh không được để trống',
        ]);
        $slider = new Slider();
        $slider->name = $request->name;
        $slider->desc = $request->desc;
        // sử dụng hàm hỗ trợ image trong Trait class
        $data_image = $this->HelperUploadImageTrait('slider',$request->slider_image);

        if(!empty($data_image)){
            $slider->slider_image = $data_image['image_path'];
        }
        $slider->save();
        return redirect()->route('sliders.index')->with('notification','Thêm mới thành công !');
    }
    public function delete($id){
        $slider = $this->slider->find($id);
        //xóa ảnh trong thư mục
        unlink(public_path($slider->slider_image));
        $slider->delete();
        return response()->json([
            'code' => '200',
            'status' => 'success',
        ],200);
        // return redirect()->route('sliders.index')->with('notification','Xóa thành công !');
    }
    public function edit($id){
        $slider = $this->slider->find($id);
        return view('admin.slider.edit',compact('slider'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'desc'=>'required|min:3',
        ],[
            'name.required'=>'Tên slider không đuợc để trống!',
            'desc.required'=>'Mô tả ngắn không được để trống',
        ]);
        $slider = $this->slider->find($id);
        $slider->name = $request->name;
        $slider->desc = $request->desc;
        // dd($request->slider_image);
        if($request->slider_image != null){
            $data_image = $this->HelperUploadImageTrait('slider',$request->slider_image);
            unlink(public_path($slider->slider_image));
            $slider->slider_image = $data_image['image_path'];
        }
        $slider->save();
        return redirect()->route('sliders.edit',['id'=> $id])->with('notification','Cập nhật thành công !');
    }
}
