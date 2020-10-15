<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\Cart;
use App\OrderStatus;
use App\PaymentMethod;
use Illuminate\Support\Facades\Route;

class OrdersController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['order_details', 'user', 'order_status'])
            ->where('user_id', auth()->user()->id)->get();
        $currentRoute = Route::currentRouteName();

        return view('orders.index')->with(['orders' => $orders, 'currentRoute' => $currentRoute]);
        // echo json_encode($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^0[1-9][0-9]{8}$/'],
            'address' => ['required', 'string', 'max:255'],
            'payment_method' => ['required', 'in:cod']
        ]);

        // create order
        $order = new Order;

        $order->user_id = auth()->user()->id;

        // Generate order id = user_id + current_timestamp
        $time = time();
        $order_id = $order->user_id . date("YmdHis", $time);
        $order->id = $order_id;

        $order->receiver_name = $request->first_name . ' ' . $request->last_name;
        $order->phone = $request->phone;
        $order->address = $request->address;

        // Move cart to order
        $cart = Cart::with('cart_items.product.images')
            ->where('user_id', $order->user_id)
            ->first();

        $order->subtotal = $cart->subtotal;
        $order->shipping_fee = $cart->shipping_fee;
        $order->total = $cart->total;

        $payment_method = PaymentMethod::where('name', $request->payment_method)->first();
        $order_status = OrderStatus::where('name', 'Pending')->first();

        $order->payment_method_id = $payment_method->id;
        $order->order_status_id = $order_status->id;

        $order->save();

        // create order_details
        foreach ($cart->cart_items as $item) {
            $order_detail = new OrderDetail;

            $order_detail->order_id = $order_id;
            $order_detail->product_id = $item->product_id;
            $order_detail->price = $item->product->price;
            $order_detail->quantity = $item->quantity;
            $order_detail->total = $item->total;

            $order_detail->save();

            $item->delete();
        }

        return view('carts.index');
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
        $order = Order::with(['order_details.product.images'])->find($id);

        return view('orders.show')->with(['order' => $order]);
        // echo json_encode($order);
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
