<?php

namespace App\Http\Controllers;

<<<<<<< HEAD

use App\Models\Slider;

use App\Models\Category;

=======
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
>>>>>>> jpeace08
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(){

        $imagesSliders = Slider::all();
        $latestProducts = Product::latest()->limit(8)->get();

        return view('pages.home', ['sliderImages' => $imagesSliders, 'latestProducts' => $latestProducts]);
    }
    public function category_product($id){
        $category_pro = Category::find($id);
        return view('pages.category_product',compact('category_pro'));
    }

<<<<<<< HEAD
=======
    public function getCategoryProducts(Request $request){
        $posts = Product::where([
            'category_id' => $request->id,
        ])->orderBy('updated_at', 'desc')->paginate(6);
        
        return json_encode($posts);
    }

>>>>>>> jpeace08
}
