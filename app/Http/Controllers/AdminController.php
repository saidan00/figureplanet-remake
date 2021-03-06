<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use App\Category;
use App\MediaFile;
use App\OrderStatus;
use App\MediaFileUsage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Faker\Generator as Faker;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use stdClass;

class AdminController extends Controller
{
    /**
     * For instant run only
     */
    public function instant(Faker $faker)
    {
    }

    /**
     * Redirect user based on role.
     */
    public function index()
    {
        if (auth()->check()) {
            $user = User::find(auth()->user()->id);

            if ($user->hasRole('admin')) {
                return redirect("/admin/users");
            } else if ($user->hasRole('manager')) {
                return redirect("/admin/orders");
            }
        } else {
            return redirect("/");
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
        $product = Product::find($id);

        // if product found
        if ($product != null) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'price' => ['required', 'numeric', 'min:1000', 'max:999999999'],
                'quantity' => ['required', 'numeric', 'min:' . $product->ordered_quantity, 'max:9999'],
                'image' => ['image', 'max:5120']
            ]);

            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input("price");
            $product->quantity = $request->input("quantity");
            $product->category_id = $request->input('category');
            $product->is_available = $request->input('available');

            $product->available_quantity = $product->quantity - $product->ordered_quantity;

            if ($request->hasFile('image')) {
                // chưa viết xong, chưa tối ưu nếu up file extension khác
                $request->file('image')->storeAs('public/media', $product->sku . '_01.jpg');
            }

            $product->save();
        }

        return back()->with(['flash' => 'Product is ' . $product->sku . ' updated']);
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
    public function getOrders()
    {
        $orders = Order::with(['user', 'order_status'])->orderBy('created_at', 'desc')->get();
        $currentRoute = Route::currentRouteName();
        $statuses = OrderStatus::all();

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

        return view('admins.orders.index')->with(['orders' => $orders, 'statuses' => $statuses, 'currentRoute' => $currentRoute]);
        // echo json_encode($orders);
    }

    public function showOrder($id)
    {
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

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::find($id);

        if ($order == null) {
            return abort(404);
        }

        // is reopen
        $isReopen = false;
        if ($order->order_status->name == 'Canceled' && $request->input('status') == 'Processing') {
            $isReopen = true;
        }

        // is cancel after completed - hủy sau khi hoàn thành đơn
        $isCancelCompleted = false;
        if ($order->order_status->name == 'Completed' && $request->input('status') == 'Canceled') {
            $isCancelCompleted = true;
        }

        $orderStatus = OrderStatus::where('name', $request->input('status'))->first();

        $order->order_status_id = $orderStatus->id;

        if ($request->has('note')) {
            $order->note = $request->input('note');
        }

        // update product quantity
        $flashMessage = "These products are not enough: ";
        $isReopenOk = true;
        foreach ($order->order_details as $detail) {
            if ($orderStatus->name == 'Completed') {
                $detail->product->ordered_quantity -= $detail->quantity;
                $detail->product->quantity -= $detail->quantity;
            } else if ($isCancelCompleted) {
                $detail->product->quantity += $detail->quantity;
            } else if ($orderStatus->name == 'Canceled') {
                $detail->product->ordered_quantity -= $detail->quantity;
            } else if ($isReopen) {
                // xử lý nếu không đủ số lượng để reopen
                if ($detail->product->quantity < $detail->quantity) {
                    $flashMessage .= $detail->product->sku . ", ";
                    $isReopenOk = false;
                } else {
                    $detail->product->ordered_quantity += $detail->quantity;
                }
            }

            $detail->product->available_quantity = $detail->product->quantity - $detail->product->ordered_quantity;
        }

        if ($isReopenOk) {
            foreach ($order->order_details as $detail) {
                $detail->product->save();
            }

            $order->save();
            return back();
        } else {
            $flashClassName = 'alert-danger';
            $flashMessage = substr($flashMessage, 0, -1);
            return back()->with(['flash' => $flashMessage, 'classname' => $flashClassName]);
        }

        // echo json_encode($order);

    }

    public function getUsers()
    {
        $users = User::all();
        $currentRoute = Route::currentRouteName();

        foreach ($users as $user) {
            $user->role = $user->getRoleNames()->first();
        }

        return view('admins.users.index')->with(['users' => $users, 'currentRoute' => $currentRoute]);
        // echo json_encode($users);
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $user->role = $user->getRoleNames()->first();
        $roles = Role::all();
        $currentRoute = Route::currentRouteName();

        return view('admins.users.edit')->with(['user' => $user, 'roles' => $roles, 'currentRoute' => $currentRoute]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        if ($user->getRoleNames()->first() != $request->input('role')) {
            $user->syncRoles([$request->input('role')]);
        }

        if ($user->status != $request->input('status')) {
            $user->status =  $request->input('status');
        }

        $user->save();

        return back()->with(['flash' => 'User is updated.']);
    }

    public function addUser()
    {
        $roles = Role::all();
        $currentRoute = Route::currentRouteName();

        return view('admins.users.create')->with(['roles' => $roles, 'currentRoute' => $currentRoute]);
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'in:male,female'],
            'phone' => ['required', 'regex:/^0[1-9][0-9]{8}$/'],
            'address' => ['required', 'string', 'max:255'],
            'role' => ['required', 'in:admin,manager,customer'],
        ]);

        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->assignRole($request->input('role'));

        return back()->with(['flash' => 'User ' . $user->email . ' created.']);
    }

    public function getCustomerRevenueReport()
    {
        $currentRoute = Route::currentRouteName();

        $users = User::all();

        return view('admins.reports.revenue-customer')->with(['users' => $users, 'currentRoute' => $currentRoute]);
    }

    public function createCustomerRevenueReport(Request $request)
    {
        $currentRoute = Route::currentRouteName();

        // dùng để tính tông
        $summary = new stdClass;
        $summary->products = 0;
        $summary->total = 0;

        $users = User::all();

        // lấy các order có status là Completed
        $orders = Order::whereHas('order_status', function ($s) {
            $s->where('name', 'Completed');
        });

        // lọc theo ngày
        if ($request->filled('from-date')) {
            $orders = $orders->whereDate('created_at', '>=', $request->input('from-date'));
        }

        if ($request->filled('to-date')) {
            $orders = $orders->whereDate('created_at', '<=', $request->input('to-date'));
        }

        // lọc theo email
        if ($request->input('email') != 'All') {
            $orders = $orders->whereHas('user', function ($u) use ($request) {
                $u->where('email', $request->input('email'));
            });
        }

        // sắp xếp
        $orders = $orders->orderBy('created_at', 'desc');
        $orders = $orders->get();

        // tính tổng cộng
        foreach ($orders as $item) {
            $summary->products += $item->items_count;
            $summary->total += $item->total;
        }

        session()->flashInput($request->input());

        return view('admins.reports.revenue-customer')->with(['orders' => $orders, 'users' => $users, 'summary' => $summary, 'currentRoute' => $currentRoute]);
        // echo json_encode($currentRoute);
    }

    public function getProductRevenueReport()
    {
        $currentRoute = Route::currentRouteName();
        $products = Product::all();

        return view('admins.reports.revenue-product')->with(['products' => $products, 'currentRoute' => $currentRoute]);
    }

    public function createProductRevenueReport(Request $request)
    {
        $currentRoute = Route::currentRouteName();
        $products = Product::all();

        // lấy những sản phẩm đã bán trong một khoảng thời gian cụ thể (sku, tên sp, số lượng bán, tổng tiền)
        $purchasedReport = DB::table('products')
            ->selectRaw('products.sku, products.name, COALESCE(SUM(order_details.quantity), 0) purchased, COALESCE(SUM(order_details.total), 0) total')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->join('order_statuses', 'order_statuses.id', '=', 'orders.order_status_id')
            ->where('order_statuses.name', 'like', 'Completed')
            ->when($request->input('from-date'), function ($query) use ($request) {
                return $query->whereDate('orders.created_at', '>=', $request->input('from-date'));
            })
            ->when($request->input('to-date'), function ($query) use ($request) {
                return $query->whereDate('orders.created_at', '<=', $request->input('to-date'));
            })
            ->groupBy('products.id', 'products.sku', 'products.name')
            ->orderByDesc('total');

        // xóa bảng tạm nếu nó vẫn còn trong hệ thống (trường hợp xảy ra lỗi khi chưa chạy tới lệnh xóa cuối hàm)
        DB::statement('DROP TABLE IF EXISTS tmp_product_revenue');
        // tạo bảng tạm lưu kết quả của report
        DB::statement('CREATE TABLE tmp_product_revenue ' . DB::raw($purchasedReport->toSql()), $purchasedReport->getBindings());

        // lấy những sản phẩm chưa được mua
        $noPurchasedReport = DB::table('products')
            ->selectRaw('products.sku, products.name, 0 purchased, 0 total')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('tmp_product_revenue as tmp')
                    ->whereColumn('products.sku', 'tmp.sku');
            })
            ->orderBy('name');

        // thêm sản phẩm chưa được mua vào bảng tạm
        DB::insert('INSERT INTO tmp_product_revenue ' . DB::raw($noPurchasedReport->toSql()));

        // báo cáo trả về client
        $report = DB::table('tmp_product_revenue')->get();
        $summary = DB::table('tmp_product_revenue')->selectRaw('SUM(purchased) purchased, SUM(total) total')->first();

        // xóa bảng tạm
        DB::statement('DROP TABLE IF EXISTS tmp_product_revenue');

        // trả về input của client
        session()->flashInput($request->input());

        return view('admins.reports.revenue-product')->with(['products' => $products, 'report' => $report, 'summary' => $summary, 'currentRoute' => $currentRoute]);
        // return json_encode($summary);
    }
}
