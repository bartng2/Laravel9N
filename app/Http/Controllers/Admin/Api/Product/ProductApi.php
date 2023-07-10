<?php

namespace App\Http\Controllers\Admin\Api\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;




class ProductApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sp = Product::all();
        return response()->json($sp);
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
        try {
            $nameimage = Str::random(32).".".$request->image->getClientOriginalExtension();
     
            // Create Product
             $sp = Product::create([
                'product_code' => $request->product_code,
                'category_id' => $request->category_id,
                'name' => $request->name,
                'brand' => $request->brand,
                'price' => $request->price,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'image' => $nameimage,
            ]);
     
            // Save Image in Storage folder
            Storage::disk('public')->put($nameimage, file_get_contents($request->image));    

            return response()->json($sp);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
        return response()->json($sp);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Product::find($id);

        if (!$model) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
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
            $sp = Product::find($id);
            if(!$sp){
              return response()->json([
                'message'=>'Không tìm thấy sản phẩm.'
              ],404);
            }
     
            $sp->product_code = $request->product_code;
            $sp->category_id = $request->category_id;
            $sp->name = $request->name;
            $sp->brand = $request->brand;
            $sp->price = $request->price;
            $sp->description = $request->description;
            $sp->quantity = $request->quantity;
     
            if($request->hasFile('image') && $request->file('image')->isValid()) {
                // Public storage
                $storage = Storage::disk('public');
     
                // Old iamge delete
                if($storage->exists($sp->image))
                    $storage->delete($sp->image);
     
                // Image name
                $imagename = Str::random(32).".".$request->image->getClientOriginalExtension();
                $sp->image = $imagename;
     
                // Image save in public folder
                $storage->put($imagename, file_get_contents($request->image));
            }
     
            // Update Product
            $sp->save();
     
            // Return Json Response
            return response()->json([
                'message' => "sản phẩm đã được cập nhật."],200);
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
        $storage = Storage::disk('public');
        $sp = Product::findOrFail($id);

        // Xóa ảnh (nếu có)
        if ($sp->image && $storage->exists($sp->image)) {
            $storage->delete($sp->image);
        }

        // Xóa sản phẩm
        Product::destroy($id);

        return response()->json(null, 200);
    }
}
