<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\User;
use App\Product;

class AdminController extends Controller
{
    public function index() {
        $user = User::find(auth()->user()->id);
        if ($user->hasRole('admin')) {
            redirect("admins/users");
          } else if ($user->hasRole('manager')) {
            redirect("admins/products");
          } else {
            redirect("admins/products");
          }
    }

    public function getProducts() {
        $products = Product::with(['category', 'images'])->get();

        return view('admins.products.index')->with(['products' => $products]);
        // echo json_encode($products);
    }

    public function showProduct(string $sku) {
        $product = Product::with(['category', 'images'])->where('sku', $sku)->first();
        $categories = Category::all();

        return view('admins.products.show')->with(['product' => $product, 'categories' => $categories]);
    }
}
