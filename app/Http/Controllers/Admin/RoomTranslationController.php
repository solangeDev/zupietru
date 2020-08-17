<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateRoomTranslationRequest;
use App\Http\Requests\Admin\UpdateRoomTranslationRequest;
use App\Repositories\Admin\RoomTranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RoomTranslationController extends AppBaseController
{
    /** @var  RoomTranslationRepository */
    private $roomTranslationRepository;

    public function __construct(RoomTranslationRepository $roomTranslationRepo)
    {
        $this->roomTranslationRepository = $roomTranslationRepo;
    }

    /**
     * Display a listing of the RoomTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomTranslationRepository->pushCriteria(new RequestCriteria($request));
        $roomTranslations = $this->roomTranslationRepository->all();

        return view('admin.rooms.room_translations.index')
            ->with('roomTranslations', $roomTranslations);
    }

    /**
     * Show the form for creating a new RoomTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.rooms.room_translations.create');
    }

    /**
     * Store a newly created RoomTranslation in storage.
     *
     * @param CreateRoomTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomTranslationRequest $request)
    {
        $input = $request->all();

        $roomTranslation = $this->roomTranslationRepository->create($input);

        Flash::success('Room Translation saved successfully.');

        return redirect(route('admin.rooms.roomTranslations.index'));
    }

    /**
     * Display the specified RoomTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomTranslation = $this->roomTranslationRepository->findWithoutFail($id);

        if (empty($roomTranslation)) {
            Flash::error('Room Translation not found');

            return redirect(route('admin.rooms.roomTranslations.index'));
        }

        return view('admin.rooms.room_translations.show')->with('roomTranslation', $roomTranslation);
    }

    /**
     * Show the form for editing the specified RoomTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomTranslation = $this->roomTranslationRepository->findWithoutFail($id);

        if (empty($roomTranslation)) {
            Flash::error('Room Translation not found');

            return redirect(route('admin.rooms.roomTranslations.index'));
        }

        return view('admin.rooms.room_translations.edit')->with('roomTranslation', $roomTranslation);
    }

    /**
     * Update the specified RoomTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateRoomTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomTranslationRequest $request)
    {
        $roomTranslation = $this->roomTranslationRepository->findWithoutFail($id);

        if (empty($roomTranslation)) {
            Flash::error('Room Translation not found');

            return redirect(route('admin.rooms.roomTranslations.index'));
        }

        $roomTranslation = $this->roomTranslationRepository->update($request->all(), $id);

        Flash::success('Room Translation updated successfully.');

        return redirect(route('admin.rooms.roomTranslations.index'));
    }

    /**
     * Remove the specified RoomTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomTranslation = $this->roomTranslationRepository->findWithoutFail($id);

        if (empty($roomTranslation)) {
            Flash::error('Room Translation not found');

            return redirect(route('admin.rooms.roomTranslations.index'));
        }

        $this->roomTranslationRepository->delete($id);

        Flash::success('Room Translation deleted successfully.');

        return redirect(route('admin.rooms.roomTranslations.index'));
    }
}
