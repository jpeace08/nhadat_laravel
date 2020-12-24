<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(){

        $imagesSliders = Slider::all();

        return view('pages.home', ['sliderImages' => $imagesSliders]);
    }
}
