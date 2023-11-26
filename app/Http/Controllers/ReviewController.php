<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'review' => 'required',
        ]);

        $review = new Review([
            'product_code' => $request->input('product_code'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'review' => $request->input('review'),
        ]);

        $review->save();
        return redirect()->back();
    }
}
