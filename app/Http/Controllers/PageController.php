<?php

namespace App\Http\Controllers;


use App\Models\Slider;

use App\Models\Category;

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
}
