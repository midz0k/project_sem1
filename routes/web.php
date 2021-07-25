<?php
//Admin
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Login\DashboardController;
use App\Http\Controllers\Admin\BranCateController;
//BackEnd
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\HomeFrontendContronller;
use App\Http\Controllers\Frontend\ViewController;
//Cart
use App\Http\Controllers\Cart\CartController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix' => ''], function () {
    Route::get('/',[HomeFrontendContronller::class,'Home'])->name('Homes');
    //Products
    Route::get('/product',[FrontendController::class,'Products'])->name('Product');
    Route::get('/Category/{slug}',[FrontendController::class,'Category_Product'])->name('Category_Product');
    Route::get('/Brand/{slug}',[FrontendController::class,'Brand_Product'])->name('Brand_Product');
    Route::get('/Color/{slug}',[FrontendController::class,'Color_Product'])->name('Color_Product');
    Route::get('/Promotion/{name}',[FrontendController::class,'Promotion_Product'])->name('Promotion_Product');
    //Xem Chi Tiết Sản Phẩm
    Route::get('/View/{slug}',[ViewController::class,'View'])->name('View');
    //Cart
    Route::post('/Add-Cart',[CartController::class,'Add'])->name('Cart');
    Route::get('/Show-Cart',[CartController::class,'show_cart'])->name('Show_cart');
    Route::post('/update-cart',[CartController::class,'update_all'])->name('Cart.update');
    Route::get('/ShowCart/{key}',[CartController::class,'delete'])->name('delete_Cart');
    //Route CheckOut
    Route::get('/check_out',[CartController::class,'check_out'])->name('Cart.checkOut');
    Route::post('/check_out',[CartController::class,'post_check_out']);
});


Route::group(['prefix' => 'admin','middleware'=>'CheckAdmin'], function () {
    Route::get('/',[AdminController::class,'index'])->name('Home');
    //Category
    Route::get('/category',[CategoryController::class,'index'])->name('TableCategory');
    Route::get('/Create_Category',[CategoryController::class,'create'])->name('Create');
    Route::post('/Create_Categorys',[CategoryController::class,'creates'])->name('Creates');
    Route::get('/editCategory/{id}',[CategoryController::class,'editCate'])->name('editCate');
    Route::post('/editCategory/{id}',[CategoryController::class,'updateCate']);
    Route::get('/deleteCategory/{id}',[CategoryController::class,'deleteCate'])->name('deleteCate');
    //Brand
    Route::get('/brand',[BrandController::class,'index'])->name('TableBrand');
    Route::get('/Create_Brand',[BrandController::class,'create'])->name('CreateBrand');
    Route::post('/Create_Brands',[BrandController::class,'creates'])->name('CreateBrands');
    Route::get('/editBrand/{id}',[BrandController::class,'editBrand'])->name('editBrand');
    Route::post('/editBrand/{id}',[BrandController::class,'updateBrand']);
    Route::get('/deleteBrand/{id}',[BrandController::class,'deleteBrand'])->name('deleteBrand');
    //Color
    Route::get('/color',[ColorController::class,'index'])->name('TableColor');
    Route::get('/Create_Color',[ColorController::class,'create'])->name('CreateColor');
    Route::post('/Create_Colors',[ColorController::class,'creates'])->name('CreateColors');
    Route::get('/editColor/{id}',[ColorController::class,'editColor'])->name('editColor');
    Route::post('/editColor/{id}',[ColorController::class,'updateColor']);
    Route::get('/deleteColor/{id}',[ColorController::class,'deleteColor'])->name('deleteColor');
    //Promotion
    Route::get('/promotion',[PromotionController::class,'index'])->name('TablePromotion');
    Route::get('/Create_Promotion',[PromotionController::class,'create'])->name('CreatePromotion');
    Route::post('/Create_Promotions',[PromotionController::class,'creates'])->name('CreatePromotions');
    Route::get('/editPromotion/{id}',[PromotionController::class,'editPromotion'])->name('editPromotion');
    Route::post('/editPromotion/{id}',[PromotionController::class,'updatePromotion']);
    Route::get('/deletePromotison/{id}',[PromotionController::class,'deletePromotion'])->name('deletePromotion');
    //Product
    Route::get('/product',[ProductController::class,'index'])->name('TableProduct');
    Route::get('/Create_Product',[ProductController::class,'create'])->name('CreateProduct');
    Route::post('/Create_Products',[ProductController::class,'creates'])->name('CreateProducts');
    Route::get('/editProduct/{id}',[ProductController::class,'editProduct'])->name('editProduct');
    Route::post('/editProduct/{id}',[ProductController::class,'updateProduct']);
    Route::get('/Brand_lirt',[ProductController::class,'Brands_Category'])->name('Brands_Category');
    Route::get('/deleteProduct/{id}',[ProductController::class,'deletePro'])->name('deletePro');
    //Urers
    Route::get('/Urer',[UsersController::class,'index'])->name('TableUrer');
    //Brand Catefory
    Route::get('/Brand-Category',[BranCateController::class,'index'])->name('Table-Brand-Category');
    Route::get('/Create-Brand-Category',[BranCateController::class,'CreateBrand'])->name('Create-Brand');
    Route::post('/Create-Brand-Categorys',[BranCateController::class,'CreateBrandCategorys'])->name('Create-Brand-Categorys');
    Route::get('/Brand-Category/{id}',[BranCateController::class,'editBrandCategory'])->name('edit-Brand-Category');
    Route::post('/Brand-Category/{id}',[BranCateController::class,'updateBrandCategorys']);
    Route::get('/delete-Brand-Categoryt/{id}',[BranCateController::class,'deleteBrandCategory'])->name('delete-Brand-Category');
});

//Đăng Ký Tài Khoảns
Route::get('/SignUp',[LoginController::class,'Create'])->name('SignUp');
Route::post('/post_register',[LoginController::class,'Creates'])->name('Createlogin');
//Đăng nhập
Route::get('/Login',[LoginController::class,'Signin'])->name('Signin');
Route::post('/Logins',[LoginController::class,'postSignin'])->name('Logins');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
//Login Admin
Route::get('/Login_Admin',[DashboardController::class,'Login'])->name('AdminLogin');
Route::post('/checkLogin',[DashboardController::class,'postLogin'])->name('checkLogin');
Route::get('/logoutAdmin',[DashboardController::class,'logout'])->name('logoutAdmin');