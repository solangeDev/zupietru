<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateBookingDetailAPIRequest;
use App\Http\Requests\API\Admin\UpdateBookingDetailAPIRequest;
use App\Models\Admin\BookingDetail;
use App\Repositories\Admin\BookingDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BookingDetailController
 * @package App\Http\Controllers\API\Admin
 */

class BookingDetailAPIController extends AppBaseController
{
    /** @var  BookingDetailRepository */
    private $bookingDetailRepository;

    public function __construct(BookingDetailRepository $bookingDetailRepo)
    {
        $this->bookingDetailRepository = $bookingDetailRepo;
    }

    /**
     * Display a listing of the BookingDetail.
     * GET|HEAD /bookingDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bookingDetailRepository->pushCriteria(new RequestCriteria($request));
        $this->bookingDetailRepository->pushCriteria(new LimitOffsetCriteria($request));
        $bookingDetails = $this->bookingDetailRepository->all();

        return $this->sendResponse($bookingDetails->toArray(), 'Booking Details retrieved successfully');
    }

    /**
     * Store a newly created BookingDetail in storage.
     * POST /bookingDetails
     *
     * @param CreateBookingDetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBookingDetailAPIRequest $request)
    {
        $input = $request->all();

        $bookingDetails = $this->bookingDetailRepository->create($input);

        return $this->sendResponse($bookingDetails->toArray(), 'Booking Detail saved successfully');
    }

    /**
     * Display the specified BookingDetail.
     * GET|HEAD /bookingDetails/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BookingDetail $bookingDetail */
        $bookingDetail = $this->bookingDetailRepository->findWithoutFail($id);

        if (empty($bookingDetail)) {
            return $this->sendError('Booking Detail not found');
        }

        return $this->sendResponse($bookingDetail->toArray(), 'Booking Detail retrieved successfully');
    }

    /**
     * Update the specified BookingDetail in storage.
     * PUT/PATCH /bookingDetails/{id}
     *
     * @param  int $id
     * @param UpdateBookingDetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookingDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var BookingDetail $bookingDetail */
        $bookingDetail = $this->bookingDetailRepository->findWithoutFail($id);

        if (empty($bookingDetail)) {
            return $this->sendError('Booking Detail not found');
        }

        $bookingDetail = $this->bookingDetailRepository->update($input, $id);

        return $this->sendResponse($bookingDetail->toArray(), 'BookingDetail updated successfully');
    }

    /**
     * Remove the specified BookingDetail from storage.
     * DELETE /bookingDetails/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BookingDetail $bookingDetail */
        $bookingDetail = $this->bookingDetailRepository->findWithoutFail($id);

        if (empty($bookingDetail)) {
            return $this->sendError('Booking Detail not found');
        }

        $bookingDetail->delete();

        return $this->sendResponse($id, 'Booking Detail deleted successfully');
    }
}
