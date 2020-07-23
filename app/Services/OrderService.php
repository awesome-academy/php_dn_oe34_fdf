<?php

namespace App\Services;

use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Product;
use App\Model\ProductImage;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Auth;
use DB;
use Exception;
use Log;

class OrderService
{
    /**
     * @var OrderRepository
     */
    protected $orderRepository;

    public function __construct()
    {
        $this->orderRepository = app(OrderRepository::class);
    }

    public function getOrderDetail($id)
    {
        $products = $this->orderRepository->getProductByOrders($id);

        if (!empty($products)) {
            $orderDetails = $products->first()->orderDetails();
            $order = $this->orderRepository->findObject($orderDetails, 'order_id', $id)->order;

            $products = $this->getProductAdditionAttribute($products, $id);

            return [
                'order' => $order,
                'products' => $products,
            ];
        }

        return null;
    }

    public function getProductAdditionAttribute($products, $id)
    {
        foreach ($products as $product) {
            $orderDetails = $this->orderRepository->findObject($product->orderDetails, 'order_id', $id);
            $avatar = $this->orderRepository->findObject($product->productImages, 'image_type', ProductImage::$types['Avatar']);

            $product->quantity = $orderDetails->quantity;
            $product->price = $orderDetails->unit_price;
            $product->total = $orderDetails->quantity * $orderDetails->unit_price;
            $product->image_path = $avatar->image_path;
        }

        return $products;
    }

    public function createOrder($params)
    {
        $userId = Auth::id();
        $orderCode = strtoupper(now()->monthName) . now()->day . str_replace(':', '', now()->toTimeString()) . $userId;

        $paramsCreate = [
            'total_price' => $params['total_price'],
            'user_id' => $userId,
            'order_code' => $orderCode,
        ];

        return $this->orderRepository->createOrder($paramsCreate, $params['products']);
    }

    public function getOrderDetailParams($params, $id)
    {
        $paramsOrderDetail = [];

        foreach ($params as $param) {
            $product = $this->orderRepository->findObject(Product::query(), 'id', $param['product_id']);

            if (empty($product)) {
                continue;
            }

            $paramsOrderDetail[] = [
                'product_id' => $product->id,
                'unit_price' => $product->price,
                'quantity' => $param['quantity'],
                'order_id' => $id,
            ];
        }

        return $paramsOrderDetail;
    }
}
