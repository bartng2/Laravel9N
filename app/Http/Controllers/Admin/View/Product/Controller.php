<?php

namespace App\Http\Controllers\Admin\View\Product;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function LoadView($title, $home, $data, $show)
    {
        $data['title'] = $title;
        $data['header'] = view('Admin.layout.header');
        $data['left_menu'] = view('Admin.layout.left_menu');
        $data['home'] = view($home, $show);
        return $data;
    }
}
