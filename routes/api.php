<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\Category\CategoryApi;
use App\Http\Controllers\Admin\Api\Product\ProductApi;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('cate', [CategoryApi::class, 'index']); //danh sách danh mục
Route::post('cate', [CategoryApi::class, 'store']); //thêm mới danh mục
Route::get('cate/{id}', [CategoryApi::class, 'show']);
Route::put('cate/{id}', [CategoryApi::class, 'update']); //cập nhật danh mục
Route::delete('cate/{id}', [CategoryApi::class, 'destroy']); //cập nhật danh mục


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('sp', [ProductApi::class, 'index']); //danh sách sản phẩm
Route::post('sp', [ProductApi::class, 'store']); //thêm mới sản phẩm
Route::get('sp/{id}', [ProductApi::class, 'show']); //hiển thị chi tiết sản phẩm
Route::put('sp/{id}', [ProductApi::class, 'update']); //cập nhật sản phẩm
Route::delete('sp/{id}', [ProductApi::class, 'destroy']); //xóa sản phẩm