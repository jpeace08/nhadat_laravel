<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $user;
    private $role;
    function __construct(User $user ,Role $role)
    {
        $this->user =$user;
        $this->role = $role;
    }
    public function index(){
        $users = $this->user->paginate(10);
        return view('admin.user.index',compact('users'));
    }
    public function create(){
        $roles = $this->role->all();
        return view('admin.user.add',compact('roles'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:45',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'role_id'=>'required'
        ],
        [
            'name.required'=>'Tên không được để trống !',
            'name.min'=>'Độ dài tên phải từ 3 đến 45 ký tự !',
            'name.max'=>'Độ dài tên phải từ 3 đến 45 ký tự !',
            'email.required'=>'email không được để trống !',
            'email.email'=>'email không đúng định dạng !',
            'email.unique'=>'email đã tồn tại !',
            'password.required'=>'Mật khẩu không được để trống !',
            'password.min'=>'Mật khẩu chứa ít nhất 6 ký tự !',
            'role_id.required'=>'Vai trò không được để trống !'
        ]);
        try{
            DB::beginTransaction();
                $user = new User();
                $user->name =$request->name;
                $user->email =$request->email;
                $user->password = Hash::make($request->password);
                $user->save();
                $user->roles()->attach($request->role_id);
            DB::commit();
                return redirect()->route('users.index')->with('notification','Thêm mới thành công');
        }
        catch(\Exception $exception){
            DB::rollBack();
            //file log storage->logs
            Log::error('Message :'.$exception->getMessage().' - Line:'.$exception->getLine());
        }
    }
    public function edit($id){
        $user = $this->user->find($id);
        $roles = $this->role->all();
        $rolesOfUser = $user->roles;
        //Vì bên view use Collection Constains lên không cần dùng bước này nữa
        // foreach($rolesOfUser as $item){
        //     $arr[] = $item->id;
        // }
        // $idRolesOfUser = $arr;
        return view('admin.user.edit',compact('user','rolesOfUser','roles'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required|min:3|max:45',
            'role_id'=>'required'
        ],
        [
            'name.required'=>'Tên không được để trống !',
            'name.min'=>'Độ dài tên phải từ 3 đến 45 ký tự !',
            'name.max'=>'Độ dài tên phải từ 3 đến 45 ký tự !',
            'role_id.required'=>'Vai trò không được để trống !'
        ]);
        try{
            DB::beginTransaction();
                $user = $this->user->find($id);
                $user->name =$request->name;
                if(!empty($request->password)){
                    $user->password = Hash::make($request->password);
                }
                $user->save();
                $user->roles()->sync($request->role_id);
            DB::commit();
                return redirect()->route('users.edit',['id'=>$id])->with('notification','Cập nhật thành công');
        }
        catch(\Exception $exception){
            DB::rollBack();
            //file log storage->logs
            Log::error('Message :'.$exception->getMessage().' - Line:'.$exception->getLine());
        }
    }
    public function delete($id){
        try{
            DB::beginTransaction();
            $user = $this->user->find($id);
            $user->roles()->detach();
            $user->delete();
            DB::commit();
            // nếu đúng trả về chuỗi json cho ajax thực hiện
            return response()->json([
                'code' => '200',
                'status' => 'success',
            ],200);
        }
        catch(\Exception $exception){
            DB::rollBack();
             //file log storage->logs
             Log::error('Message :'.$exception->getMessage().' - Line:'.$exception->getLine());
             // lỗi cũng trả về json cho ajax thông báo lỗi
             return response()->json([
                'code' => '500',
                'status' => 'fail',
            ],500);
        }
    }
}
