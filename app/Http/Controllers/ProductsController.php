<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::with(['category', 'images']);
        $categories = Category::all();

        // filter by category
        if ($request->has('category')) {
            echo $request->input('category');
            if ($request->input('category') != 'All') {
                $category = $categories->where('name', '=', $request->input('category'))->first();
                $products = $products->where('category_id', $category->id);
            }
        }

        // filter by name
        if ($request->has('name')) {
            if ($request->input('name') != 'none') {
                $products = $products->where('name', 'LIKE', '%' . $request->input('name') . '%');
            }
        }

        // filter by price
        if ($request->has('from') && $request->has('to')) {
            $products = $products->whereBetween('price', [$request->input('from'), $request->input('to')]);
        }

        // order by
        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'default':
                    break;
                case 'a-to-z':
                    $products = $products->orderBy('name');
                    break;
                case 'z-to-a':
                    $products = $products->orderBy('name', 'desc');
                    break;
                case 'low-to-high':
                    $products = $products->orderBy('price');
                    break;
                case 'high-to-low':
                    $products = $products->orderBy('price', 'desc');
                    break;
                default:
                    break;
            }
        }

        // pagination
        $products = $products->paginate(9);

        return view('products.index')->with(['products' => $products, 'categories' => $categories]);
        // echo json_encode($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sku)
    {
        $product = Product::with(['category', 'images'])->where('sku', $sku)->first();

        return view('products.show')->with(['product' => $product]);

        // echo json_encode($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
