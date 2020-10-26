<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\User;
use App\Product;

class AdminController extends Controller
{
    /**
     * Redirect user based on role.
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        if ($user->hasRole('admin')) {
            redirect("admins/users");
        } else if ($user->hasRole('manager')) {
            redirect("admins/products");
        } else {
            redirect("admins/products");
        }
    }

    /**
     * Display all products.
     */
    public function getProducts()
    {
        $products = Product::with(['category', 'images'])->get();

        return view('admins.products.index')->with(['products' => $products]);
        // echo json_encode($products);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  string  $sku
     * @return \Illuminate\View\View
     */
    public function showProduct(string $sku)
    {
        $product = Product::with(['category', 'images'])->where('sku', $sku)->first();
        $categories = Category::all();

        return view('admins.products.show')->with(['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'gender' => ['required', 'in:male,female'],
            'phone' => ['required', 'regex:/^0[1-9][0-9]{8}$/'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $product = Product::find($id);

        if ($product != null) {

        }
    }
}
