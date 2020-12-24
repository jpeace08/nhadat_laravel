<?php

namespace App\Http\Controllers;

use App\Models\Slider;

use App\Models\Category;
use App\Models\Location;
use App\Models\Product;

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
        return view('pages.detail',compact('product','related_products'));
    }
    public function getCategoryProducts(Request $request)
    {
        $posts = Product::where([
            'category_id' => $request->id,
        ])->orderBy('updated_at', 'desc')->paginate(6);

        return json_encode($posts);
    }

    public function getProductsByLocation(Request $request){
        $location = Location::where('name','like','%'.$request->location.'%')->get()[0];
        if($location) {
            $products = Product::where([
                'location_id' => $location->id,
            ])->get();
            if ($products && count($products)) {
                return json_encode($products);
            }
        }
        return json_encode(false);
    }
}
