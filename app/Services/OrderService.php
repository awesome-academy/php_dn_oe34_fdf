<?php

namespace App\Services;

use App\Model\ProductImage;
use App\Repositories\ProductRepository;

class OrderService
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    public function __construct()
    {
        $this->productRepository = app(ProductRepository::class);
    }

    public function getOrderDetail($id)
    {
        $products = $this->productRepository->getProductByOrders($id);

        if (!empty($products)) {
            $orderDetails = $products->first()->orderDetails();
            $order = $this->productRepository->findObject($orderDetails, 'order_id', $id)->order;

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
            $orderDetails = $this->productRepository->findObject($product->orderDetails, 'order_id', $id);
            $avatar = $this->productRepository->findObject($product->productImages, 'image_type', ProductImage::$types['Avatar']);

            $product->quantity = $orderDetails->quantity;
            $product->price = $orderDetails->unit_price;
            $product->total = $orderDetails->quantity * $orderDetails->unit_price;
            $product->image_path = $avatar->image_path;
        }

        return $products;
    }
}
