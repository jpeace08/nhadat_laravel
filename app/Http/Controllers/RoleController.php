<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    private $role;


    function __construct(Role $role)
    {
        $this->role = $role;

    }
    public function index(){
        $roles = $this->role->paginate(10);
        return view('admin.role.index',compact('roles'));
    }
    public function create(){

        return view('admin.role.add');
    }
    public function store(Request $request){
        $this->validate($request,
        [
            'name'=>'required|min:3',
            'display_name'=>'required'
        ],
        [
            'name.required'=>'Tên không được để trống !',
            'name.min'=>'Tên phải nhiều hơn 3 ký tự !',
            'display_name.required'=>'Tên hiển thị không được để trống !'
        ]);
        // dd($request);
        try{
            DB::beginTransaction();

            $role = new Role();
            $role->name =$request->name;
            $role->display_name = $request->display_name;
            $role->save();

            // $role->permissions()->attach($request->permission_id);

            DB::commit();
            return redirect()->route('roles.index')->with('notification','Thêm mới thành công !');
        }
        catch(\Exception $exception){
            DB::rollBack();
             //file log storage->logs
             Log::error('Message :'.$exception->getMessage().' - Line:'.$exception->getLine());
        }
    }
    public function edit($id){
        $role =$this->role->find($id);
        // $permissionOfRole = $role->permissions;
        // $permissionParents =$this->permission->where('parent_id',0)->get();
        return view('admin.role.edit',compact('role'));
    }
    public function update(Request $request, $id){
        $this->validate($request,
        [
            'name'=>'required|min:3',
            'display_name'=>'required'
        ],
        [
            'name.required'=>'Tên không được để trống !',
            'name.min'=>'Tên phải nhiều hơn 3 ký tự !',
            'display_name.required'=>'Tên hiển thị không được để trống !'
        ]);
        try{
            DB::beginTransaction();
            $role = $this->role->find($id);
            $role->name =$request->name;
            $role->display_name = $request->display_name;
            $role->save();

            // $role->permissions()->sync($request->permission_id);

            DB::commit();
            return redirect()->route('roles.index')->with('notification','Cập nhật thành công !');
        }
        catch(\Exception $exception){
            DB::rollBack();
             //file log storage->logs
             Log::error('Message :'.$exception->getMessage().' - Line:'.$exception->getLine());
        }
    }
    public function delete($id){
        $this->role->find($id)->delete();
        return response()->json([
            'code' => '200',
            'status' => 'success',
        ],200);
    }
}
