<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    // tạo liên kết đến bảng categorys
    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    // tạo liên kết đến bảng locations
    public function locations(){
        return $this->belongsTo(Location::class,'location_id','id');
    }
    public function product_images(){
        return $this->hasMany(ProductImages::class,'product_id','id');
    }
}
