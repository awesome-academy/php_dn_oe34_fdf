<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use App\Services\ProductService;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var ProductService
     */
    protected $productService;
    /**
     * @var OrderService
     */
    protected $orderService;

    public function __construct()
    {
        $this->productService = app(ProductService::class);
        $this->orderService = app(OrderService::class);
    }

    public function showOrderList()
    {
        $user = Auth::user();

        return view('users.orders.list', compact('user'));
    }

    public function getOrderProducts(Request $request)
    {
        $params = $request->get('products');

        $orderProduct = $this->productService->getCartProducts($params);

        return response()->json(view('users.orders.product', $orderProduct)->render());
    }

    public function store(Request $request)
    {
        $params = $request->except('_token');

        $status = $this->orderService->createOrder($params);

        if (!$status) {
            return response()->json([false, trans('messages.create_order_failed')]);
        }

        return response()->json([true, trans('messages.create_order_success')]);
    }
}
