<?php

namespace App\Http\Controllers\Admin\Api\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Category;


class CategoryApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cate = Category::all();
        return response()->json($cate);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all(); 
         $validator = Validator::make($input, [
            'category_code' => 'nullable',
            'name' => 'required'
         ]);
         if($validator->fails()){
            $arr = [
              'success' => false,
              'message' => 'Lỗi kiểm tra dữ liệu',
              'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
         }
         $cate = Category::create($input);
         $arr = ['status' => true,
            'message'=>"Thêm danh mục thành công!"
         ];
         return response()->json($arr, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Category::find($id);

        if (!$model) {
            return response()->json(['message' => 'Danh mục không tồn tại'], 404);
        }

        return response()->json($model, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Find 
            $cate = Category::find($id);
            if(!$cate){
              return response()->json([
                'message'=>'Không tìm thấy danh mục.'
              ],404);
            }
     
            $cate->category_code = $request->category_code;
            $cate->name = $request->name;
     
            // Update
            $cate->save();
     
            // Return Json Response
            return response()->json([
                'message' => "danh mục đã được cập nhật."],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Lỗi"],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cate = Category::destroy($id);
       $arr = [
          'status' => true,
          'message' =>'danh mục đã được xóa',
          'data' => [],
       ];
       return response()->json($arr, 200);
    }
}
