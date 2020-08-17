<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateOrderAPIRequest;
use App\Http\Requests\API\Admin\UpdateOrderAPIRequest;
use App\Models\Admin\Order;
use App\Repositories\Admin\OrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OrderController
 * @package App\Http\Controllers\API\Admin
 */

class OrderAPIController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
    }

    /**
     * Display a listing of the Order.
     * GET|HEAD /orders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orderRepository->pushCriteria(new RequestCriteria($request));
        $this->orderRepository->pushCriteria(new LimitOffsetCriteria($request));
        $orders = $this->orderRepository->all();

        return $this->sendResponse($orders->toArray(), 'Orders retrieved successfully');
    }

    /**
     * Store a newly created Order in storage.
     * POST /orders
     *
     * @param CreateOrderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderAPIRequest $request)
    {
        $input = $request->all();

        $orders = $this->orderRepository->create($input);

        return $this->sendResponse($orders->toArray(), 'Order saved successfully');
    }

    public function storeOrder()
    {
        $order = '{
            "order": {

                "user_id": "1",
                "name": "Erick Perez",
                "email": "erick.perez@jumperr.com",
                "phone": "+(58) (426) 337-66-65",

                "shipping_address": "Caracas -> OBLIGATORIO",
                "products": [
                    {
                        "product_id": "1 -> OBLIGATORIO",
                        "products_quantity": "4 -> OBLIGATORIO",
                        "comment":"Sin gluten por favor.",
                        "additionals":[
                            {"id":"1", "additional_quantity":"1"},
                            {"id":"2", "additional_quantity":"1"},
                            {"id":"3", "additional_quantity":"1"}
                        ]
                    },
                    {
                        "product_id": "2 -> OBLIGATORIO",
                        "products_quantity": "6 -> OBLIGATORIO",
                        "comment":"La mitad sin mariscos.",
                        "additionals":[
                            {"id":"1", "additional_quantity":"1"},
                            {"id":"4", "additional_quantity":"2"}
                        ]
                    },
                    {
                        "product_id": "3 -> OBLIGATORIO",
                        "products_quantity": "2 -> OBLIGATORIO",
                        "comment":"La mitad sin mariscos."
                    }
                ]
            }
        }';

        $order = json_decode($order);

        $orderModel = (object)[];

        foreach ($order as $key => $order_parameter) {
            print $order_parameter->user_id . '<br>';
            print $order_parameter->shipping_address . '<br>';

            foreach ($order_parameter->products as $keyProduct => $product) {

            }
        }
        exit();
    }

    /**
     * Display the specified Order.
     * GET|HEAD /orders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Order $order */
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        return $this->sendResponse($order->toArray(), 'Order retrieved successfully');
    }

    /**
     * Update the specified Order in storage.
     * PUT/PATCH /orders/{id}
     *
     * @param  int $id
     * @param UpdateOrderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderAPIRequest $request)
    {
        $input = $request->all();

        /** @var Order $order */
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        $order = $this->orderRepository->update($input, $id);

        return $this->sendResponse($order->toArray(), 'Order updated successfully');
    }

    /**
     * Remove the specified Order from storage.
     * DELETE /orders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Order $order */
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        $order->delete();

        return $this->sendResponse($id, 'Order deleted successfully');
    }
}
