<?php

namespace App\Http\Controllers;

use App\Category;
use App\MediaFile;
use App\MediaFileUsage;
use App\Order;
use App\OrderStatus;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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
        $currentRoute = Route::currentRouteName();

        return view('admins.products.index')->with(['products' => $products, 'currentRoute' => $currentRoute]);
        // echo json_encode($products);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  string  $sku
     * @return \Illuminate\View\View
     */
    public function editProduct(string $sku)
    {
        $product = Product::with(['category', 'images'])->where('sku', $sku)->first();

        if ($product == null) {
            return abort(404);
        }

        $categories = Category::all();
        $currentRoute = Route::currentRouteName();

        return view('admins.products.edit')->with(['product' => $product, 'categories' => $categories, 'currentRoute' => $currentRoute]);
    }

    public function addProduct()
    {
        $categories = Category::all();
        $currentRoute = Route::currentRouteName();

        return view('admins.products.create')->with(['categories' => $categories, 'currentRoute' => $currentRoute]);
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

        return back();
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

    /**
     *  Show all orders
     *
     * @return \Illuminate\View\View
     */
    public function getOrders() {
        $orders = Order::with(['user', 'order_status'])->orderBy('created_at', 'desc')->get();
        $currentRoute = Route::currentRouteName();

        foreach ($orders as $item) {
            $item->statusClassName = '';

            switch ($item->order_status->name) {
                case 'Canceled':
                    $item->statusClassName = 'text-danger';
                    break;
                case 'Processing':
                    $item->statusClassName = 'text-warning';
                    break;
                case 'Delivering':
                    $item->statusClassName = 'text-info';
                    break;
                case 'Pending':
                    $item->statusClassName = 'text-muted';
                    break;
                case 'Completed':
                    $item->statusClassName = 'text-success';
                    break;
                default:
                    break;
            }
        }

        return view('admins.orders.index')->with(['orders' => $orders, 'currentRoute' => $currentRoute]);
        // echo json_encode($orders);
    }

    public function showOrder($id) {
        $order = Order::with(['order_details.product'])->where('id', $id)->first();
        $currentRoute = Route::currentRouteName();

        if ($order == null) {
            return abort(404);
        }

        $order->statusClassname = '';
        switch ($order->order_status->name) {
            case 'Canceled':
                $order->statusClassName = 'text-danger';
                break;
            case 'Processing':
                $order->statusClassName = 'text-warning';
                break;
            case 'Delivering':
                $order->statusClassName = 'text-info';
                break;
            case 'Pending':
                $order->statusClassName = 'text-muted';
                break;
            case 'Completed':
                $order->statusClassName = 'text-success';
                break;
            default:
                break;
        }

        return view('admins.orders.show')->with(['order' => $order, 'currentRoute' => $currentRoute]);
    }

    public function updateOrderStatus(Request $request, $id) {
        $order = Order::find($id);
        $currentRoute = Route::currentRouteName();

        if ($order == null) {
            return abort(404);
        }

        $orderStatus = OrderStatus::where('name', $request->input('status'))->first();

        $order->order_status_id = $orderStatus->id;

        if ($request->has('note')) {
            $order->note = $request->input('note');
        }

        $order->save();

        $order->statusClassname = '';
        switch ($order->order_status->name) {
            case 'Canceled':
                $order->statusClassName = 'text-danger';
                break;
            case 'Processing':
                $order->statusClassName = 'text-warning';
                break;
            case 'Delivering':
                $order->statusClassName = 'text-info';
                break;
            case 'Pending':
                $order->statusClassName = 'text-muted';
                break;
            case 'Completed':
                $order->statusClassName = 'text-success';
                break;
            default:
                break;
        }

        return back();
        // echo json_encode($order);

    }

    public function getUsers() {
        $users = User::all();
        $currentRoute = Route::currentRouteName();

        foreach($users as $user) {
            $user->role = $user->getRoleNames()->first();
        }

        return view('admins.users.index')->with(['users' => $users, 'currentRoute' => $currentRoute]);
        // echo json_encode($users);
    }

    public function editUser($id) {
        $user = User::find($id);
        $user->role = $user->getRoleNames()->first();
        $roles = Role::all();
        $currentRoute = Route::currentRouteName();

        return view('admins.users.edit')->with(['user' => $user, 'roles' => $roles, 'currentRoute' => $currentRoute]);
    }

    public function updateUser(Request $request, $id) {
        $user = User::find($id);
        $roles = Role::all();
        $currentRoute = Route::currentRouteName();

        if ($user->getRoleNames()->first() != $request->input('role')) {
            $user->syncRoles([$request->input('role')]);
        }

        if ($user->status != $request->input('status')) {
            $user->status =  $request->input('status');
        }

        $user->save();

        return back()->with(['flash' => 'User is updated.']);
    }

    public function addUser() {
        $roles = Role::all();
        $currentRoute = Route::currentRouteName();

        return view('admins.users.create')->with(['roles' => $roles, 'currentRoute' => $currentRoute]);
    }
}
