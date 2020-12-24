<?php

namespace App\Http\Controllers;

<<<<<<< HEAD

use App\Models\Slider;

use App\Models\Category;
<<<<<<< HEAD

=======
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
>>>>>>> jpeace08
=======
use App\Models\Product;
>>>>>>> 485727774c84978a4092a4a6f50e9c4a16d520e2
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(){

        $imagesSliders = Slider::all();
        $latestProducts = Product::latest()->limit(8)->get();

        return view('pages.home', ['sliderImages' => $imagesSliders, 'latestProducts' => $latestProducts]);
    }
    public function category_product($slug){
        $category_pro = Category::where('slug',$slug)->first();
        return view('pages.category_product',compact('category_pro'));
    }
    public function detail($slug){

        $product = Product::where('slug',$slug)->first();
        $cate_products= $product->categories->first();
        $related_products = $cate_products->products->take(6);

<<<<<<< HEAD
<<<<<<< HEAD
=======
    public function getCategoryProducts(Request $request){
        $posts = Product::where([
            'category_id' => $request->id,
        ])->orderBy('updated_at', 'desc')->paginate(6);
        
        return json_encode($posts);
    }

>>>>>>> jpeace08
=======
        return view('pages.detail',compact('product','related_products'));
    }
>>>>>>> 485727774c84978a4092a4a6f50e9c4a16d520e2
}
