<?php

namespace App\Http\Controllers;

use App\Category;
use App\MediaFile;
use App\MediaFileUsage;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use GuzzleHttp\Handler\Proxy;
use phpDocumentor\Reflection\Types\Void_;

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

    public function addProduct()
    {
        $categories = Category::all();

        return view('admins.products.create')->with(['categories' => $categories]);
    }

    /**
     * Store new product to storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:1000', 'max:999999999'],
            'image' => ['required', 'image', 'max:5120'],
            'category' => ['required'],
            'available' => ['required'],
        ]);

        $product = new Product;

        if ($product != null) {
            $product->sku = $this->generateSku();
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input("price");
            $product->category_id = $request->input('category');
            $product->is_available = $request->input('available');

            $product->save();

            if ($request->hasFile('image')) {
                // chưa viết xong, chưa tối ưu nếu up file extension khác
                $request->file('image')->storeAs('public/media', $product->sku . '_01.jpg');

                $media = new MediaFile;
                $media->path = 'storage/media/' . $product->sku . '_01.jpg';
                $media->content_type = $request->file('image')->getClientMimeType();

                $media->save();

                $mediaFileUsage = new MediaFileUsage;
                $mediaFileUsage->media_file_id = $media->getQueueableId();
                $mediaFileUsage->usage_table = 'products';
                $mediaFileUsage->usage_id = $product->id;

                $mediaFileUsage->save();
            }
        }

        return redirect('/admin/products');
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:1000', 'max:999999999'],
            'image' => ['image', 'max:5120']
        ]);

        $product = Product::find($id);

        // if product found
        if ($product != null) {
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input("price");
            $product->category_id = $request->input('category');
            $product->is_available = $request->input('available');

            if ($request->hasFile('image')) {
                // chưa viết xong, chưa tối ưu nếu up file extension khác
                $request->file('image')->storeAs('public/media', $product->sku . '_01.jpg');
            }

            $product->save();
        }

        return back()->with(['flash' => 'Product ' . $product->sku . ' is updated.']);
    }

    /**
     * Generate random sku with 6 characters
     *
     * @return string
     */
    private function generateSku()
    {
        // Output: 54ESMD
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        while (true) {
            $sku = substr(str_shuffle($permitted_chars), 0, 6);
            $product = Product::where('sku', $sku)->first();
            if ($product == null) {
                //sku isn't taken
                return $sku;
            }
        }
    }
}
