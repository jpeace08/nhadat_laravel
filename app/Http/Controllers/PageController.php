<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Slider;
=======
use App\Models\Category;
>>>>>>> 79f84acc6a14b17bc25e0e2510a199abbe08be39
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(){

        $imagesSliders = Slider::all();

        return view('pages.home', ['sliderImages' => $imagesSliders]);
    }
    public function category_product($id){
        $category_pro = Category::find($id);
        return view('pages.category_product',compact('category_pro'));
    }
}
