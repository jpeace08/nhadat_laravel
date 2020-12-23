<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    private $location;
    public function __construct(Location $location)
    {
        $this->location = $location;
    }
    public function index(){
        $locations = $this->location->paginate(10);
        return view('admin.location.index',compact('locations'));
    }
    public function create(){
        return view ('admin.location.add');
    }
    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required|min:2|max:30'
        ],[
            'name.required'=> "Bạn chưa nhập tên danh mục",
            'name.min'=>"Độ dài tên danh mục từ 2 đến 30 ký tự",
            'name.max'=>"Độ dài tên danh mục từ 2 đến 30 ký tự"
        ]);
        $location = new Location();
        $location->name = $request->name;

        $location->slug =Str::slug($request->name,'-');
        $location->save();
        return redirect()->route('locations.create')->with('notification','Thêm mới thành công !');
    }
    public function edit($id){
        $location = $this->location->find($id);
        return view('admin.location.edit',compact('location'));
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
        $location = $this->location->find($id)->update([
            'name'=>$request->name,
            'slug'=> Str::slug($request->name,'-')
        ]);
        return redirect()->route('locations.index')->with('notification','Sửa thành công !');
    }
    public function delete($id){
        // sử dụng softDelete
        $this->location->find($id)->delete();
        // return redirect()->route('locations.index')->with('notification','Delete thành công!');
        return response()->json([
            'code' => '200',
            'status' => 'success',
        ],200);
    }
}
