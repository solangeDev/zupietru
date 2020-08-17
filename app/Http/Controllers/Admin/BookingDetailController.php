<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateBookingDetailRequest;
use App\Http\Requests\Admin\UpdateBookingDetailRequest;
use App\Repositories\Admin\BookingDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BookingDetailController extends AppBaseController
{
    /** @var  BookingDetailRepository */
    private $bookingDetailRepository;

    public function __construct(BookingDetailRepository $bookingDetailRepo)
    {
        $this->bookingDetailRepository = $bookingDetailRepo;
    }

    /**
     * Display a listing of the BookingDetail.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bookingDetailRepository->pushCriteria(new RequestCriteria($request));
        $bookingDetails = $this->bookingDetailRepository->all();

        return view('admin.bookings.booking_details.index')
            ->with('bookingDetails', $bookingDetails);
    }

    /**
     * Show the form for creating a new BookingDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.bookings.booking_details.create');
    }

    /**
     * Store a newly created BookingDetail in storage.
     *
     * @param CreateBookingDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateBookingDetailRequest $request)
    {
        $input = $request->all();

        $bookingDetail = $this->bookingDetailRepository->create($input);

        Flash::success('Booking Detail saved successfully.');

        return redirect(route('admin.bookings.bookingDetails.index'));
    }

    /**
     * Display the specified BookingDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bookingDetail = $this->bookingDetailRepository->findWithoutFail($id);

        if (empty($bookingDetail)) {
            Flash::error('Booking Detail not found');

            return redirect(route('admin.bookings.bookingDetails.index'));
        }

        return view('admin.bookings.booking_details.show')->with('bookingDetail', $bookingDetail);
    }

    /**
     * Show the form for editing the specified BookingDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bookingDetail = $this->bookingDetailRepository->findWithoutFail($id);

        if (empty($bookingDetail)) {
            Flash::error('Booking Detail not found');

            return redirect(route('admin.bookings.bookingDetails.index'));
        }

        return view('admin.bookings.booking_details.edit')->with('bookingDetail', $bookingDetail);
    }

    /**
     * Update the specified BookingDetail in storage.
     *
     * @param  int              $id
     * @param UpdateBookingDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookingDetailRequest $request)
    {
        $bookingDetail = $this->bookingDetailRepository->findWithoutFail($id);

        if (empty($bookingDetail)) {
            Flash::error('Booking Detail not found');

            return redirect(route('admin.bookings.bookingDetails.index'));
        }

        $bookingDetail = $this->bookingDetailRepository->update($request->all(), $id);

        Flash::success('Booking Detail updated successfully.');

        return redirect(route('admin.bookings.bookingDetails.index'));
    }

    /**
     * Remove the specified BookingDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bookingDetail = $this->bookingDetailRepository->findWithoutFail($id);

        if (empty($bookingDetail)) {
            Flash::error('Booking Detail not found');

            return redirect(route('admin.bookings.bookingDetails.index'));
        }

        $this->bookingDetailRepository->delete($id);

        Flash::success('Booking Detail deleted successfully.');

        return redirect(route('admin.bookings.bookingDetails.index'));
    }
}
