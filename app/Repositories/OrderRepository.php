<?php

namespace App\Repositories;

use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Product;
use App\Services\OrderService;
use DB;
use Exception;
use Log;

class OrderRepository extends BaseRepository
{
    public function createOrder($paramsCreate, $params)
    {
        $service = new OrderService();

        try {
            DB::beginTransaction();

            $order = Order::create($paramsCreate);

            $orderDetails = $service->getOrderDetailParams($params, $order->id);

            if (count($orderDetails) == 0) {
                throw new Exception(trans('messages.no_product_create'));
            }

            foreach ($orderDetails as $orderDetail) {
                OrderDetail::create($orderDetail);
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());

            DB::rollBack();

            return false;
        }
    }

    public function getProductByOrders($orderId)
    {
        try {
            return Product::withTrashed()
                ->with('productImages', 'orderDetails')
                ->whereHas('orderDetails', function ($query) use ($orderId) {
                    return $query->where('order_id', $orderId);
                })->get();
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return false;
        }
    }
}
