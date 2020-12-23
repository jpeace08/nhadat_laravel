<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait uploadImageTrait{
    public function HelperUploadImageTrait($folder_name,$file){
            //lấy tên hình
            $typeImg= $file->getClientOriginalExtension();
            $type_allow = array('png','jpg','gif','jpeg');
            $nameImg = $file->getClientOriginalName();
            //đặt tên mới tránh tồn tại
            $nameImgAfter = Str::random(6)."_".$nameImg;
            //kiểm tra nếu trùng nó sẽ while lấy tên mới
            while(file_exists("upload/".$folder_name."/".$nameImgAfter)){
                $nameImgAfter = Str::random(6)."_".$nameImg;
            }
            //Lưu hình vào tệp
            $file->move("upload/".$folder_name."",$nameImgAfter);
            //lưu tên hình vào database
            $data = [
                'image_name'=> $nameImg,
                'image_path'=> "/upload/".$folder_name."/".$nameImgAfter
            ];
            return $data;
        }
    }
