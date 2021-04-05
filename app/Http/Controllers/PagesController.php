<?php

namespace App\Http\Controllers;

use App\Product;

class PagesController extends Controller
{
    public function index() {
        $products = Product::where('is_available', true)->take(8)->get();
        return view('pages.index')->with(['products' => $products]);
    }

    public function about() {
        return view('pages.about');
    }

    public function contact() {
        return view('pages.contact');
    }
}
