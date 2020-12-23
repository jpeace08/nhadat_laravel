<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(){
        return view('pages.home');
    }
    public function category_product($id){
        $category_pro = Category::find($id);
        return view('pages.category_product',compact('category_pro'));
    }
}
