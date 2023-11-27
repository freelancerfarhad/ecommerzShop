<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\FilterProductController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Frontend route
Route::get('/',[HomeController::class,'HomePage'])->name('home.page');
Route::get('/category-by-product/{id}',[HomeController::class,'CategorybyProduct'])->name('categorybyproduct');
Route::get('/brand-by-product/{id}',[HomeController::class,'BrandbyProduct'])->name('brandbyproduct');
Route::get('/product/details/{id}',[HomeController::class,'ProductDetailss'])->name('product-details');
Route::get('/all/shop',[HomeController::class,'Shop'])->name('all-shop');

Route::get('/login',[AuthController::class,'LoginPage'])->name('login.page');
Route::get('/register',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/login',[AuthController::class,'loadLogin']);
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
// filter
Route::get('/search-product',[FilterProductController::class,'search_products'])->name('search.products');
Route::get('/sort-by',[FilterProductController::class,'sort_by'])->name('sort.by');
//cart
Route::post('/add-to-cart',[CartController::class,'AddToCarts']);
Route::post('/remove-product-cart',[CartController::class,'RemoveCarts']);
Route::get('/load-cart-data',[CartController::class,'MiniCarts']);
Route::post('/update-cart',[CartController::class,'updateCarts']);
//wish
Route::post('/add-to-wish',[WishListController::class,'AddToWish']);
Route::get('/load-wish-data',[WishListController::class,'MiniWish']);
Route::post('/remove-product-wish',[WishListController::class,'RemoveWish']);


Route::middleware(['auth'])->group(function(){
    Route::get('/cart-list',[CartController::class,'CartList'])->name("cartlist");
    Route::get('/check-out',[CheckoutController::class,'Checkout'])->name("checkout");
    Route::post('/order-place',[CheckoutController::class,'orderPlace'])->name("place-order");
    Route::get('/thank-you',[CheckoutController::class,'thankYou'])->name("thank-you");
    //wishlist
    Route::get('/wish-list',[WishListController::class,'WishList'])->name("wishlist");
});


//Backend route

Route::group(['prefix' => 'super-admin','middleware'=>['web','isSuperAdmin']],function(){
    // Backend Page Route 
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/brand',[BrandController::class,'brandPage'])->name('brands');
    Route::get('/category',[CategoryController::class,'categoryPage'])->name('category');
    Route::get('/product',[ProductController::class,'productPage'])->name('products');
    Route::get('/slider',[SliderController::class,'sliderPage'])->name('slider');
    //Backend Api Route by Brand
    Route::post('/create-brand',[BrandController::class,'CreateBrind'])->name('brand.create');
    Route::get('/brand-list',[BrandController::class,'BrandList'])->name('brand.list');
    Route::post('/update-brand',[BrandController::class,'UpdateBrind'])->name('brand.update');
    Route::post('/brand_by_id',[BrandController::class,'BrandById'])->name('brand.brandid');
    Route::post('/delete-brand',[BrandController::class,'DeleteBrind'])->name('brand.delete');
    //Backend Api Route by Category
    Route::post('/create-category',[CategoryController::class,'CreateCategory'])->name('category.create');
    Route::get('/category-list',[CategoryController::class,'CategoryList'])->name('category.list');
    Route::post('/update-category',[CategoryController::class,'UpdateCategory'])->name('category.update');
    Route::post('/category_by_id',[CategoryController::class,'CategoryById'])->name('category.categoryid');
    Route::post('/delete-category',[CategoryController::class,'DeleteCategory'])->name('category.delete');
    //Backend Api Route by Product
    Route::post('/store-product',[ProductController::class,'StoreProduct'])->name('product.store');
    Route::get('/product-list',[ProductController::class,'ProductList'])->name('product.list');
    Route::get('/product-create',[ProductController::class,'ProductCreate'])->name('product.create');
    Route::put('/update-product/{id}',[ProductController::class,'UpdateProduct'])->name('product.update');
    Route::get('/product_by_id/{id}',[ProductController::class,'ProductByIdEdit'])->name('product.productidedit');
    Route::delete('/delete-product/{id}',[ProductController::class,'destroy'])->name('product.delete');
    Route::get('/product/active/{id}',[ProductController::class,'statusActive'])->name('statusActive');
    Route::get('/product/inacrive/{id}',[ProductController::class,'statusInactive'])->name('statusInactive');
    Route::put('/product/multiple/{id}',[ProductController::class,'MultipleImgCahange'])->name('productimagemultiple');
    Route::get('/product/multiple/delete/{id}',[ProductController::class,'MultipleImgCahangeDeleted'])->name('multipleimgdeletebysingle');
    // backend api route by slider
        Route::get('/create-slider',[SliderController::class,'ProductCreate'])->name('slider.create');
        Route::post('/store-slider',[SliderController::class,'sliderStore'])->name('slider.store');
        Route::get('/slider_update/{id}',[SliderController::class,'sliderByIdEdit'])->name('slider.edit');
        Route::put('/update-slider/{id}',[SliderController::class,'sliderUpdate'])->name('slider.update');
        Route::delete('/delete-slider/{id}',[SliderController::class,'Deleteslider'])->name('slider.delete');
        // order manage
        Route::get('/order',[OrderController::class,'OrderList'])->name('order');
        Route::get('/order-view/{id}',[OrderController::class,'OrderView'])->name('order-views');
        Route::put('/order-update/{id}',[OrderController::class,'OrderUpdate'])->name('status-update');
        Route::get('/order-history',[OrderController::class,'OrderHistory'])->name('order.history');
        // all registration user
        Route::get('/all-user',[DashboardController::class,'AllUsers'])->name('all-user');
        Route::get('/user-view/{id}',[DashboardController::class,'AllUsersview'])->name('user-view');

});
// Route::group(['prefix' => 'vendor','middleware'=>['web','isVendor']],function(){

// });

// ********** User Routes *********
Route::group(['middleware'=>['web','isUser','auth']],function(){
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');
    Route::get('/order-list',[UserController::class,'orderList'])->name('order-list');
    Route::get('/order-view/{id}',[UserController::class,'orderListView'])->name('order-view');
});