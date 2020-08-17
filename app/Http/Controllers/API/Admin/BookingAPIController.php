<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateBookingAPIRequest;
use App\Http\Requests\API\Admin\UpdateBookingAPIRequest;
use App\Models\Admin\Booking;
use App\Repositories\Admin\BookingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BookingController
 * @package App\Http\Controllers\API\Admin
 */

class BookingAPIController extends AppBaseController
{
    /** @var  BookingRepository */
    private $bookingRepository;

    public function __construct(BookingRepository $bookingRepo)
    {
        $this->bookingRepository = $bookingRepo;
    }

    /**
     * Display a listing of the Booking.
     * GET|HEAD /bookings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bookingRepository->pushCriteria(new RequestCriteria($request));
        $this->bookingRepository->pushCriteria(new LimitOffsetCriteria($request));
        $bookings = $this->bookingRepository->all();

        return $this->sendResponse($bookings->toArray(), 'Bookings retrieved successfully');
    }

    /**
     * Store a newly created Booking in storage.
     * POST /bookings
     *
     * @param CreateBookingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBookingAPIRequest $request)
    {
        $input = $request->all();

        $bookings = $this->bookingRepository->create($input);

        return $this->sendResponse($bookings->toArray(), 'Booking saved successfully');
    }

    /**
     * Display the specified Booking.
     * GET|HEAD /bookings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Booking $booking */
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            return $this->sendError('Booking not found');
        }

        return $this->sendResponse($booking->toArray(), 'Booking retrieved successfully');
    }

    /**
     * Update the specified Booking in storage.
     * PUT/PATCH /bookings/{id}
     *
     * @param  int $id
     * @param UpdateBookingAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookingAPIRequest $request)
    {
        $input = $request->all();

        /** @var Booking $booking */
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            return $this->sendError('Booking not found');
        }

        $booking = $this->bookingRepository->update($input, $id);

        return $this->sendResponse($booking->toArray(), 'Booking updated successfully');
    }

    /**
     * Remove the specified Booking from storage.
     * DELETE /bookings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Booking $booking */
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            return $this->sendError('Booking not found');
        }

        $booking->delete();

        return $this->sendResponse($id, 'Booking deleted successfully');
    }
}
