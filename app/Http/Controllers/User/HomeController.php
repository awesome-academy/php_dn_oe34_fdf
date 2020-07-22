<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var ProductService
     */
    protected $productService;

    public function __construct()
    {
        $this->productService = app(ProductService::class);
    }

    public function index()
    {
        $products = Product::paginate(config('custom.paginate.limits'));

        return view('users.index', compact('products'));
    }

    public function listCart()
    {
        return view('users.carts.list');
    }

    public function showCart(Request $request)
    {
        $params = $request->get('products');

        if (empty($params)) {
            return response()->json("<td colspan='9' class='text-center'><i>" . trans('messages.no_item_list') . "</i></td>");
        }

        $cartData = $this->productService->getCartProducts($params);

        if (count($cartData['cart_products']) == 0) {
            return response()->json(null);
        }

        return response()->json(view('users.carts.product', $cartData)->render());
    }
}
