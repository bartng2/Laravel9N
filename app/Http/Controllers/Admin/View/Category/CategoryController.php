<?php

namespace App\Http\Controllers\Admin\View\Category;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost/limpua/public/api/cate');
        $cate = $response->json();
        $data = [];
        $show['cate'] = $cate;
        $data = [];
        $data = $this->loadView('Danh sách danh mục', 'Admin/Component/Category/ListCategory', $data, $show);
        return view('Admin/home/main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $show = [];
        $data = $this->loadView('Thêm mới danh mục', 'Admin/Component/Category/AddCategory', $data, $show);
        return view('Admin/home/main', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Gửi yêu cầu POST đến API
        $response = Http::post('http://localhost/limpua/public/api/cate', [
            'category_code' => $request->category_code,
            'name' => $request->name,
        ]);

        // Xử lý phản hồi từ API
        $responseData = $response->json();

        // Xử lý và trả về view
        return redirect()->route('admin.listcate');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get('http://localhost/limpua/public/api/cate/' .$id);
        $edit = $response->json();
        $data = [];
        $show['edit'] = $edit;
        $data = $this->loadView('Cập nhật danh mục', 'Admin/Component/Category/EditCategory',$data, $show);
        return view('Admin/home/main', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Gửi yêu cầu POST đến API
        $response = Http::put('http://localhost/limpua/public/api/cate/' .$id, [
            'category_code' => $request->category_code,
            'name' => $request->name,
        ]);

        // Xử lý phản hồi từ API
        $responseData = $response->json();

        // Xử lý và trả về view
        return redirect()->route('admin.listcate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete('http://localhost/limpua/public/api/cate/' . $id);
        return redirect()->route('admin.listcate');
    }
}
