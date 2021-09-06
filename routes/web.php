<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ThumbnailController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\BundleProductController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\ShopCategoryBrand;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\PdfController;




Route::get('/',[IndexController::class,"index"]);
Route::get('product/{slug}',[SingleProductController::class,'index']);
Route::get('/category',[ShopCategoryBrand::class,'category']);
Route::get('category/{slug}',[ShopCategoryBrand::class,'single_category']);
//Route::get('/subcategory',[ShopCategoryBrand::class,'subcategory']);
Route::get('subcategory/{slug}/',[ShopCategoryBrand::class,'single_subcategory']);



//User Details For Front End
Route::middleware(['auth','customer'])->group(function (){
    Route::get('user/information',[UserDetailsController::class,'index'])->name('user.information');
    Route::post('user/information',[UserDetailsController::class,'update_user'])->name('user.update');
    Route::get('user/notification',[UserDetailsController::class,'notification'])->name('user.notification');
    Route::get('user/invoice',[UserDetailsController::class,'invoice'])->name('user.invoice');
    Route::get('user/address',[UserDetailsController::class,'address'])->name('user.address');
    Route::get('user/wishlist',[UserDetailsController::class,'wishlist'])->name('user.wishlist');
    Route::get('user/wishlist/{id}',[UserDetailsController::class,'delete_wishlist'])->name('destroy.wishlist');
    Route::get('order/delete/{id}',[OrderController::class,'delete_order'])->name('destroy.order');
    Route::get('order/reorder/{id}',[OrderController::class,'reorder'])->name('reorder');
    Route::get('order/view/{id}',[OrderController::class,'viewOrder'])->name('view.order');
    Route::post('order/invoice',[PdfController::class,'downloadInvoice'])->name('order.download');

    Route::get('/wishlist',[CartController::class,'wishlist'])->name('wishlist');
    Route::get('wishlist/{slug}',[WishlistController::class,'add_wishlist'])->name('add.wishlist');

    Route::post('cart/update',[CartController::class,'updateCart'])->name('update.cart');
    Route::get('/cart/{coupon}',[CartController::class,'cart'])->name('cart');
    Route::get('/checkout',[CartController::class,'checkout'])->name('checkout');
    Route::post('/order',[OrderController::class,'index'])->name('order');
});

Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::get('cart/add/{slug}',[CartController::class,'addToCart'])->name('add.cart');
Route::post('cart/delete',[CartController::class,'deleteCartItem'])->name('delete.cart');



Route::get('order/text',[OrderController::class,'text'])->name('text'); //For check Order invoice ;

require __DIR__.'/auth.php';

Route::middleware('isAdmin')->group(function (){


Route::group(['prefix'=>'dashboard'],function (){
Route::get('/',[DashboardController::class,'index']);

//Category Controller
    Route::get('/category',[CategoryController::class,'index']);
    Route::get('category/create',[CategoryController::class,'create']);
    Route::post('category/store',[CategoryController::class,'store']);
    Route::get('category/{id}/edit',[CategoryController::class,'edit']);
    Route::post('category/update',[CategoryController::class,'update']);
    Route::get('category/{id}/delete',[CategoryController::class,'destroy']);
    Route::get('category/del-category',[CategoryController::class,'deletedCat']);
    Route::get('category/{id}/restore',[CategoryController::class,'restoreDeletedItems']);
    Route::get('category/{id}/f-delete',[CategoryController::class,'forceDeletedItems']);

//    Subcategory Controller
    Route::get('/sub-category',[SubCategoryController::class,'index']);
    Route::get('sub-category/create',[SubCategoryController::class,'create']);
    Route::post('sub-category/store',[SubCategoryController::class,'store']);
    Route::get('sub-category/{id}/edit',[SubCategoryController::class,'edit']);
    Route::post('sub-category/update',[SubCategoryController::class,'update']);
    Route::get('sub-category/{id}/delete',[SubCategoryController::class,'destroy']);
    Route::get('sub-category/del-category',[SubCategoryController::class,'deletedCat']);
    Route::get('sub-category/{id}/restore',[SubCategoryController::class,'restoreDeletedItems']);
    Route::get('sub-category/{id}/f-delete',[SubCategoryController::class,'forceDeletedItems']);

    //    Brand Controller
    Route::get('/brand',[BrandController::class,'index']);
    Route::get('brand/create',[BrandController::class,'create']);
    Route::post('brand/store',[BrandController::class,'store']);
    Route::get('brand/{id}/edit',[BrandController::class,'edit']);
    Route::post('brand/update',[BrandController::class,'update']);
    Route::get('brand/{id}/delete',[BrandController::class,'destroy']);
    Route::get('brand/del-category',[BrandController::class,'deletedItems']);
    Route::get('brand/{id}/restore',[BrandController::class,'restoreDeletedItems']);
    Route::get('brand/{id}/f-delete',[BrandController::class,'forceDeletedItems']);

    //    Product Controller
    Route::get('/product',[ProductController::class,'index']);
    Route::get('product/create',[ProductController::class,'create']);
    Route::post('product/create/ajax',[ProductController::class,'ajax']);
    Route::post('product/store',[ProductController::class,'store']);
    Route::get('product/{id}',[ProductController::class,'view']);
    Route::get('product/{id}/edit',[ProductController::class,'edit']);
    Route::post('product/update',[ProductController::class,'update']);
    Route::get('product/{id}/delete',[ProductController::class,'destroy']);
    Route::get('product/del/product',[ProductController::class,'deletedItems']);
    Route::get('product/{id}/restore',[ProductController::class,'restoreDeletedItems']);
    Route::get('product/{id}/p-delete',[ProductController::class,'forceDeletedItems']);

    Route::get('/thumbnail/all',[ThumbnailController::class,'index']);
    Route::get('thumbnail/{id}',[ThumbnailController::class,'view']);
    Route::post('thumbnail/add',[ThumbnailController::class,'add']);
    Route::post('thumbnail/delete',[ThumbnailController::class,'destroy']);

    Route::get('/attribute/all',[ProductAttributeController::class,'index']);
    Route::get('attribute/{id}',[ProductAttributeController::class,'view']);
    Route::post('attribute/add',[ProductAttributeController::class,'add']);
    Route::get('attribute/delete/{id}',[ProductAttributeController::class,'destroy']);


    //Bundle Product
    Route::get('/bundle',[BundleProductController::class,'index']);
    Route::get('bundle/create',[BundleProductController::class,'create']);
    Route::post('bundle/store',[BundleProductController::class,'store']);
    Route::post('bundle/search',[BundleProductController::class,'search']);

});
});
