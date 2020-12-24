<?php

namespace App\Http\Controllers;


use App\Models\Slider;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(){

        $imagesSliders = Slider::all();

        return view('pages.home', ['sliderImages' => $imagesSliders]);
    }
    public function category_product($slug){
        $category_pro = Category::where('slug',$slug)->first();
        return view('pages.category_product',compact('category_pro'));
    }
    public function detail($slug){

        $product = Product::where('slug',$slug)->first();
        $cate_products= $product->categories->first();
        $related_products = $cate_products->products->take(6);

        return view('pages.detail',compact('product','related_products'));
    }
}
