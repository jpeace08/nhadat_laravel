<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/quantri', [AdminController::class, 'loginAdmin'])->name('admin.login');
//Route  đăng nhập
// Route::post('quantri/postLogin','AdminController@postLoginAdmin');
Route::post('quantri/postLogin',[AdminController::class,'postLoginAdmin']);
Route::get('quantri/logout',[AdminController::class,'logoutAdmin'])->name('admin.logout');

Route::group(['prefix'=>'/quantri','middleware'=>'loginAdmin'],function(){

    Route::get('/home',function(){
        return view ('admin.home.index');
    })->name('home.index');

    Route::prefix('/categories')->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    });
    Route::prefix('/locations')->group(function(){
        Route::get('/', [LocationController::class, 'index'])->name('locations.index');
        Route::get('/create', [LocationController::class, 'create'])->name('locations.create');
        Route::post('/store', [LocationController::class, 'store'])->name('locations.store');
        Route::get('/edit/{id}', [LocationController::class, 'edit'])->name('locations.edit');
        Route::post('/update/{id}', [LocationController::class, 'update'])->name('locations.update');
        Route::get('/delete/{id}', [LocationController::class, 'delete'])->name('locations.delete');
    });

    Route::prefix('/products')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/store', [ProductController::class, 'store'])->name('products. ');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');

        Route::get('/delete_related_image/{id}', [ProductController::class, 'deleteImagePro'])->name('products.delete_image_pro');
    });

    Route::prefix('/sliders')->group(function(){
        Route::get('/', [SliderController::class, 'index'])->name('sliders.index');
        Route::get('/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::post('/store', [SliderController::class, 'store'])->name('sliders.store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::post('/update/{id}', [SliderController::class, 'update'])->name('sliders.update');
        Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('sliders.delete');
    });

    Route::prefix('/roles')->group(function(){
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');
    });


    Route::prefix('/users')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
    });
});


//=====================================================front end ===============================================================//

Route::get('/',[PageController::class, 'index'])->name('front.home.index');

Route::get('/products/{id}', [PageController::class, 'getCategoryProducts'])->name('front.category.products');

Route::get('/danh-muc/{slug}',[PageController::class,'category_product'])->name('front.category.product');
Route::get('/san-pham/{slug}',[PageController::class,'detail'])->name('front.product.detail');

