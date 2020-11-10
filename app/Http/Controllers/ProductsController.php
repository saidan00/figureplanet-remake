<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        $products = Product::with(['category', 'images'])->where('is_available', true);
        $categories = Category::all();

        // filter by category
        if ($request->has('category')) {
            if ($request->input('category') != 'All') {
                $category = $categories->where('name', '=', $request->input('category'))->first();
                if ($category) {
                    $products = $products->where('category_id', $category->id);
                }
            }
        }

        // filter by name
        if ($request->has('name')) {
            if ($request->input('name') != '') {
                $products = $products
                    ->where('name', 'LIKE', '%' . $request->input('name') . '%')
                    ->orWhere('sku', 'LIKE', $request->input('name'));
            }
        }

        // filter by price
        if ($request->has('from') && $request->has('to')) {
            $products = $products->whereBetween('price', [$request->input('from'), $request->input('to')]);
        }

        // order by
        if ($request->has('sort')) {
            switch ($request->input('sort')) {
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
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param string $sku
     * @return Application|Factory|View|void
     */
    public function show(string $sku)
    {
        $product = Product::with(['category', 'images'])->where('sku', $sku)->where('is_available', true)->first();

        if ($product == null) {
            return abort(404);
        }

        return view('products.show')->with(['product' => $product]);
        // echo json_encode($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
