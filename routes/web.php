<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\Shop2Component;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\View\Category\CategoryController;
use App\Http\Controllers\Admin\View\Product\ProductController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class)->name('home.index');

Route::get('shop', ShopComponent::class)->name('shop');

Route::get('search', SearchComponent::class)->name('search');

Route::get('product/{product_code}', DetailsComponent::class)->name('product.details'); //chi tiết sản phẩm

Route::get('cart', CartComponent::class)->name('shop.cart');

Route::get('checkout/{cart_id}', CheckoutComponent::class)->name('shop.checkout');

Route::get('wishlist', WishlistComponent::class)->name('shop.wishlist');

Route::get('shop2', Shop2Component::class)->name('shop2');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



/////////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::post('addCart', [CartComponent::class, 'addCart'])->name('Cart.add');
Route::post('ShopaddCart', [ShopComponent::class, 'addCart'])->name('Shop.addCart');
Route::put('updateCart/{product_code}', [CartComponent::class, 'updateCart'])->name('Shop.updateCart');
Route::delete('deleteCart/{product_code}', [CartComponent::class, 'destroyCart'])->name('Shop.deleteCart');
Route::delete('deleteAllCart/{user_id}', [CartComponent::class, 'destroyAllCart'])->name('Shop.deleteAllCart');




////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::post('ShopaddWishlist', [WishlistComponent::class, 'addWishlist'])->name('Shop.addWishlist');
Route::delete('deleteAllWishlist/{user_id}', [WishlistComponent::class, 'destroyAllWishlist'])->name('Shop.deleteAllWishlist');
Route::delete('deleteWishlist/{product_code}', [WishlistComponent::class, 'destroyWishlist'])->name('Shop.deleteWishlist');
Route::post('WishlistaddCart', [WishlistComponent::class, 'addCart'])->name('Wishlist.addCart');



/////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::middleware(['auth','authadmin'])->group(function(){
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard'); //trang chủ
    Route::get('admin/dashboard/listcategory', [CategoryController::class, 'index'])->name('admin.listcate'); //Danh sách danh mục sản phẩm
    Route::get('admin/dashboard/addcategory', [CategoryController::class, 'create'])->name('admin.addcate'); //Giao diện thêm danh mục sản phẩm
    Route::post('admin/dashboard/addcategory', [CategoryController::class, 'store'])->name('admin.storecate'); //Thêm danh mục sản phẩm
    Route::get('admin/dashboard/editcategory/{id}', [CategoryController::class, 'edit'])->name('admin.editcate'); //Giao diện sửa danh mục sản phẩm
    Route::put('admin/dashboard/updatecategory/{id}', [CategoryController::class, 'update'])->name('admin.updatecate'); //Danh sách danh mục sản phẩm
    Route::delete('admin/dashboard/deletecategory/{id}', [CategoryController::class, 'destroy'])->name('admin.deletecate');// xóa danh mục sản phẩm


    Route::get('admin/dashboard/listproduct', [ProductController::class, 'index'])->name('admin.listproduct'); //Danh sách sản phẩm
    Route::get('admin/dashboard/addproduct/{id}', [ProductController::class, 'create'])->name('admin.addproduct'); //giao diện thêm sản phẩm
    Route::post('admin/dashboard/addproduct', [ProductController::class, 'store'])->name('admin.storeproduct'); //thêm sản phẩm
    Route::get('admin/dashboard/showproduct/{id}', [ProductController::class, 'show'])->name('admin.showproduct'); //giao diện chi tiết sản phẩm
    Route::get('admin/dashboard/editproduct/{id}', [ProductController::class, 'edit'])->name('admin.editproduct'); //giao diện cập nhật sản phẩm
    Route::put('admin/dashboard/updateproduct/{id}', [ProductController::class, 'update'])->name('admin.updateproduct'); //cập nhật sản phẩm
    Route::delete('admin/dashboard/deleteproduct/{id}', [ProductController::class, 'destroy'])->name('admin.deleteproduct'); // Xóa sản phẩm



});


require __DIR__.'/auth.php';
