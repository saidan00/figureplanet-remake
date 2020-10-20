<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\CartItem;
use App\Http\Resources\Cart as CartResource;
use App\Http\Resources\CartItem as CartItemResource;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use stdClass;

class CartsController extends Controller
{
    protected $shipping = 40000; // ship = 40.000 VND

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = $this->getCart();

        return view('carts.index')->with(['cart' => $cart]);
        // echo json_encode($cart);
    }

    public function processCheckout()
    {
        $cart = $this->getCart();

        return view('carts.checkout')->with(['cart' => $cart]);
        // echo json_encode($cart);
    }

    private function getCart()
    {
        $cart = new stdClass;

        // get cart of logged in user
        if (auth()->check()) {
            $cart = Cart::with(['cart_items.product.images', 'user'])
                ->where('user_id', auth()->user()->id)
                ->first();
        }

        return $cart;
    }

    /**
     * AJAX (GET): Return number of item(s) in cart
     */
    public function getTotalCart()
    {
        $cart = $this->getCart();
        echo $cart->total_item ?? 0;
    }

    /**
     * AJAX (POST): Add item(s) to cart
     */
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity') ?? 1;
        $userId = auth()->user()->id;

        $cart = Cart::where('user_id', $userId)->first();

        // if there is no cart in db
        if ($cart == null) {
            $cart = new Cart;
            $cart->user_id = $userId;
            $cart->save();
        }

        // INSERT ON DUPLICATE KEY UPDATE
        DB::statement('INSERT INTO cart_items(cart_id, product_id, quantity, created_at, updated_at) VALUES(?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP) ON DUPLICATE KEY UPDATE quantity = VALUES(quantity) + quantity',  [$cart->id, $productId, $quantity]);
        return json_encode($cart);
    }

    /**
     * AJAX (POST): Update cart
     */
    public function updateCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $userId = auth()->user()->id;

        // fn(): arrow function in PHP
        $cart = Cart::where('user_id', $userId)
            ->first();

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->first();

        $item->quantity = $quantity;
        $item->save();

        return new CartResource($cart);
        // return json_encode($item);
    }

    /**
     * AJAX (POST): Remove item from cart
     */
    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');
        $userId = auth()->user()->id;

        $cart = Cart::where('user_id', $userId)->first();

        CartItem::where(['cart_id' => $cart->id, 'product_id' => $productId])
            ->delete();

        return new CartResource($cart);
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
    public function show($id)
    {
        //
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
