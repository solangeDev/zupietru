<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateOrderDetailAPIRequest;
use App\Http\Requests\API\Admin\UpdateOrderDetailAPIRequest;
use App\Models\Admin\OrderDetail;
use App\Repositories\Admin\OrderDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OrderDetailController
 * @package App\Http\Controllers\API\Admin
 */

class OrderDetailAPIController extends AppBaseController
{
    /** @var  OrderDetailRepository */
    private $orderDetailRepository;

    public function __construct(OrderDetailRepository $orderDetailRepo)
    {
        $this->orderDetailRepository = $orderDetailRepo;
    }

    /**
     * Display a listing of the OrderDetail.
     * GET|HEAD /orderDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orderDetailRepository->pushCriteria(new RequestCriteria($request));
        $this->orderDetailRepository->pushCriteria(new LimitOffsetCriteria($request));
        $orderDetails = $this->orderDetailRepository->all();

        return $this->sendResponse($orderDetails->toArray(), 'Order Details retrieved successfully');
    }

    /**
     * Store a newly created OrderDetail in storage.
     * POST /orderDetails
     *
     * @param CreateOrderDetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderDetailAPIRequest $request)
    {
        $input = $request->all();

        $orderDetails = $this->orderDetailRepository->create($input);

        return $this->sendResponse($orderDetails->toArray(), 'Order Detail saved successfully');
    }

    /**
     * Display the specified OrderDetail.
     * GET|HEAD /orderDetails/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OrderDetail $orderDetail */
        $orderDetail = $this->orderDetailRepository->findWithoutFail($id);

        if (empty($orderDetail)) {
            return $this->sendError('Order Detail not found');
        }

        return $this->sendResponse($orderDetail->toArray(), 'Order Detail retrieved successfully');
    }

    /**
     * Update the specified OrderDetail in storage.
     * PUT/PATCH /orderDetails/{id}
     *
     * @param  int $id
     * @param UpdateOrderDetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var OrderDetail $orderDetail */
        $orderDetail = $this->orderDetailRepository->findWithoutFail($id);

        if (empty($orderDetail)) {
            return $this->sendError('Order Detail not found');
        }

        $orderDetail = $this->orderDetailRepository->update($input, $id);

        return $this->sendResponse($orderDetail->toArray(), 'OrderDetail updated successfully');
    }

    /**
     * Remove the specified OrderDetail from storage.
     * DELETE /orderDetails/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OrderDetail $orderDetail */
        $orderDetail = $this->orderDetailRepository->findWithoutFail($id);

        if (empty($orderDetail)) {
            return $this->sendError('Order Detail not found');
        }

        $orderDetail->delete();

        return $this->sendResponse($id, 'Order Detail deleted successfully');
    }
}
