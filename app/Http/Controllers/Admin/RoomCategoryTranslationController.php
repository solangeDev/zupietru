<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateRoomCategoryTranslationRequest;
use App\Http\Requests\Admin\UpdateRoomCategoryTranslationRequest;
use App\Repositories\Admin\RoomCategoryTranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RoomCategoryTranslationController extends AppBaseController
{
    /** @var  RoomCategoryTranslationRepository */
    private $roomCategoryTranslationRepository;

    public function __construct(RoomCategoryTranslationRepository $roomCategoryTranslationRepo)
    {
        $this->roomCategoryTranslationRepository = $roomCategoryTranslationRepo;
    }

    /**
     * Display a listing of the RoomCategoryTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomCategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $roomCategoryTranslations = $this->roomCategoryTranslationRepository->all();

        return view('admin.rooms.room_category_translations.index')
            ->with('roomCategoryTranslations', $roomCategoryTranslations);
    }

    /**
     * Show the form for creating a new RoomCategoryTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.rooms.room_category_translations.create');
    }

    /**
     * Store a newly created RoomCategoryTranslation in storage.
     *
     * @param CreateRoomCategoryTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomCategoryTranslationRequest $request)
    {
        $input = $request->all();

        $roomCategoryTranslation = $this->roomCategoryTranslationRepository->create($input);

        Flash::success('Room Category Translation saved successfully.');

        return redirect(route('admin.rooms.roomCategoryTranslations.index'));
    }

    /**
     * Display the specified RoomCategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomCategoryTranslation = $this->roomCategoryTranslationRepository->findWithoutFail($id);

        if (empty($roomCategoryTranslation)) {
            Flash::error('Room Category Translation not found');

            return redirect(route('admin.rooms.roomCategoryTranslations.index'));
        }

        return view('admin.rooms.room_category_translations.show')->with('roomCategoryTranslation', $roomCategoryTranslation);
    }

    /**
     * Show the form for editing the specified RoomCategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomCategoryTranslation = $this->roomCategoryTranslationRepository->findWithoutFail($id);

        if (empty($roomCategoryTranslation)) {
            Flash::error('Room Category Translation not found');

            return redirect(route('admin.rooms.roomCategoryTranslations.index'));
        }

        return view('admin.rooms.room_category_translations.edit')->with('roomCategoryTranslation', $roomCategoryTranslation);
    }

    /**
     * Update the specified RoomCategoryTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateRoomCategoryTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomCategoryTranslationRequest $request)
    {
        $roomCategoryTranslation = $this->roomCategoryTranslationRepository->findWithoutFail($id);

        if (empty($roomCategoryTranslation)) {
            Flash::error('Room Category Translation not found');

            return redirect(route('admin.rooms.roomCategoryTranslations.index'));
        }

        $roomCategoryTranslation = $this->roomCategoryTranslationRepository->update($request->all(), $id);

        Flash::success('Room Category Translation updated successfully.');

        return redirect(route('admin.rooms.roomCategoryTranslations.index'));
    }

    /**
     * Remove the specified RoomCategoryTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomCategoryTranslation = $this->roomCategoryTranslationRepository->findWithoutFail($id);

        if (empty($roomCategoryTranslation)) {
            Flash::error('Room Category Translation not found');

            return redirect(route('admin.rooms.roomCategoryTranslations.index'));
        }

        $this->roomCategoryTranslationRepository->delete($id);

        Flash::success('Room Category Translation deleted successfully.');

        return redirect(route('admin.rooms.roomCategoryTranslations.index'));
    }
}
