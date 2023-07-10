<?php

namespace App\Http\Controllers\Admin\View\Product;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost/limpua/public/api/sp');
        $sp = $response->json();
        $show['sp'] = $sp;
        $data = [];
        $data = $this->loadView('Danh sách sản phẩm', 'Admin/Component/Product/ListProduct', $data, $show);
        return view('Admin/home/main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $response = Http::get('http://localhost/limpua/public/api/cate/' .$id);
        $sp = $response->json();
        $data = [];
        $show['sp'] = $sp;
        $data = $this->loadView('Limupa | Cập nhật sản phẩm', 'Admin/Component/Product/AddProduct',$data, $show);
        return view('Admin/home/main', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
         if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $nameimage = Str::random(32) . "." . $request->image->getClientOriginalExtension();

            // Create Nhansu
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

            // Generate the URL for the API endpoint
            $apiUrl = 'http://localhost/limpua/public/api/sp';

            // Send a cURL request to the API endpoint
            $ch = curl_init($apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'product_code' => $request->product_code,
                'category_id' => $request->category_id,
                'name' => $request->name,
                'brand' => $request->brand,
                'price' => $request->price,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'image' => $nameimage,
            ]);

            $response = curl_exec($ch);
            curl_close($ch);

            return redirect()->route('admin.listcate');        
        }else{
            return response()->json([
                'message' => "'Image' is require"
            ], 400);
        }
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went wrong!"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::get('http://localhost/limpua/public/api/sp/' .$id);
        $sp = $response->json();
        $data = [];
        $show['sp'] = $sp;
        $data = $this->loadView('Chi tiết sản phẩm', 'Admin/Component/Product/ShowProduct',$data, $show);
        return view('Admin/home/main', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get('http://localhost/limpua/public/api/sp/' . $id);
        $edit = $response->json();
        $data = [];
        $show['edit'] = $edit;
        $data = $this->loadView('Cập nhật sản phẩm', 'Admin/Component/Product/EditProduct',$data, $show);
        return view('Admin/home/main', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
        // Tìm nhân viên
        $sp = Product::find($id);

        // Cập nhật thông tin
        $sp->product_code = $request->product_code;
        $sp->category_id = $request->category_id;
        $sp->name = $request->name;
        $sp->brand = $request->brand;
        $sp->price = $request->price;
        $sp->description = $request->description;
        $sp->quantity = $request->quantity;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Xóa ảnh cũ
            if (Storage::disk('public')->exists($sp->image)) {
                Storage::disk('public')->delete($sp->image);
            }

            // Lưu ảnh mới
            $nameimage = Str::random(32) . "." . $request->image->getClientOriginalExtension();
            $sp->image = $nameimage;
            Storage::disk('public')->put($nameimage, file_get_contents($request->image));
        }

        // Lưu thông tin cập nhật
        $sp->save();

        // Tạo yêu cầu HTTP tới API endpoint
        $apiUrl = 'http://localhost/limpua/public/api/sp/' . $id;
        $response = Http::put($apiUrl, $sp->toArray());

        // Kiểm tra phản hồi từ API
        if ($response->successful()) {
            return redirect()->route('admin.listproduct');
        } else {
            return response()->json([
                'message' => 'Cập nhật sản phẩm thất bại.'
            ], $response->status());
        }
        } catch (\Exception $e) {
            // Trả về JSON response khi có lỗi xảy ra
            return response()->json([
                'message' => 'Đã xảy ra lỗi.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete('http://localhost/limpua/public/api/sp/' . $id);
        return redirect()->route('admin.listproduct');
    }
}
