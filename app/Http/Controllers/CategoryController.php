<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index(){
        $categories = $this->category->paginate(10);
        return view('admin.category.index',compact('categories'));
    }
    public function create(){
        return view ('admin.category.add');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|min:2|max:30'
        ],[
            'name.required'=> "Bạn chưa nhập tên danh mục",
            'name.min'=>"Độ dài tên danh mục từ 2 đến 30 ký tự",
            'name.max'=>"Độ dài tên danh mục từ 2 đến 30 ký tự"
        ]);
        $category = new Category();
        $category->name = $request->name;

        $category->slug =Str::slug($request->name,'-');
        $category->save();
        return redirect()->route('categories.create')->with('notification','Thêm mới thành công !');
    }
    public function edit($id){
        $category = $this->category->find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request,$id){

        $this->validate($request,[
            'name'=>'required|min:2|max:30'
        ],[
            'name.required'=> "Bạn chưa nhập tên danh mục",
            'name.min'=>"Độ dài tên danh mục từ 2 đến 30 ký tự",
            'name.max'=>"Độ dài tên danh mục từ 2 đến 30 ký tự"
        ]);
        // update
        $category = $this->category->find($id)->update([
            'name'=>$request->name,
            'slug'=> Str::slug($request->name,'-')
        ]);
        return redirect()->route('categories.index')->with('notification','Sửa thành công !');
    }
    public function delete($id){
        // sử dụng softDelete
        $this->category->find($id)->delete();
        // return redirect()->route('categories.index')->with('notification','Delete thành công!');
        return response()->json([
            'code' => '200',
            'status' => 'success',
        ],200);
    }
}
