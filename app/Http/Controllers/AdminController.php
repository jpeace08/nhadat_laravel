<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class AdminController extends Controller
{
    public function loginAdmin(){
        if(Auth::check()){
            return redirect()->route('home.index');
        }
        return view('login');
    }
    public function postLoginAdmin(Request $request){
        $rule=[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ];
        $messages=[
            'email.required'=>'Email là trường bắt buộc',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu chứa ít nhất 6 lý tự'
        ];
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(),$rule,$messages);
        //nếu tồn tại lỗi => trả về giao diện lỗi
        if($validator->fails()){
            return response()->json([
               'error'=>true,
               'message'=>$validator->errors()
            ],200);
        }
        else{
            $email = $request->email;
            $password = $request->password;


            if(Auth::attempt(['email'=>$email,'password'=>$password],$request->remember_me)){
                return response()->json([
                    'error'=>false,
                    'message'=>'Đăng nhập thành công'
                ],200);

            }
            else{
                $errors = new MessageBag(['errorLogin'=>'Email hoặc mật khẩu không chính xác']);
                return response()->json([
                    'error'=>true,
                    'message'=>$errors
                ],200);
            }
        }
    }
    public function logoutAdmin(){
        Auth::logout();
        return redirect()->to('quantri');
    }
}
