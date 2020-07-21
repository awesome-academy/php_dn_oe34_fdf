<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Repositories\BaseRepository;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var BaseRepository
     */
    protected $repository;

    /**
     * @var OrderService
     */
    protected $orderService;

    public function __construct()
    {
        $this->repository = app('base_repository');
        $this->orderService = app(OrderService::class);
    }

    public function listOrders(Request $request)
    {
        $limits = $request->get('limits', config('custom.paginate.limits'));
        $search = $request->get('search', '');
        $searchKey = $request->get('search_key', '');

        $orders = $this->repository->listAll(Order::query(), $limits, $search, $searchKey);

        return view('admin.orders.list', compact('orders'));
    }

    public function showDetails($id)
    {
        $orderDetails = $this->orderService->getOrderDetail($id);

        if (!empty($orderDetails)) {
            return view('admin.orders.detail', $orderDetails);
        }

        return abort(404);
    }

    public function updateStatus(Request $request, $id)
    {
        $params = $request->except('_token', '_method');
        $order = $this->repository->findObject(Order::all(), 'id', $id);

        if (!empty($order)) {
            $status = $this->repository->update($order, $params);

            if ($status) {
                return redirect(route('order.detail', $id))->with('success', trans('messages.update_success'));
            }
        }

        return redirect(route('order.detail', $id))->with('failed', trans('messages.update_failed'));
    }
}
