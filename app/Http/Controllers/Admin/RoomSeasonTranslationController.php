<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateRoomSeasonTranslationRequest;
use App\Http\Requests\Admin\UpdateRoomSeasonTranslationRequest;
use App\Repositories\Admin\RoomSeasonTranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RoomSeasonTranslationController extends AppBaseController
{
    /** @var  RoomSeasonTranslationRepository */
    private $roomSeasonTranslationRepository;

    public function __construct(RoomSeasonTranslationRepository $roomSeasonTranslationRepo)
    {
        $this->roomSeasonTranslationRepository = $roomSeasonTranslationRepo;
    }

    /**
     * Display a listing of the RoomSeasonTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomSeasonTranslationRepository->pushCriteria(new RequestCriteria($request));
        $roomSeasonTranslations = $this->roomSeasonTranslationRepository->all();

        return view('admin.rooms.room_season_translations.index')
            ->with('roomSeasonTranslations', $roomSeasonTranslations);
    }

    /**
     * Show the form for creating a new RoomSeasonTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.rooms.room_season_translations.create');
    }

    /**
     * Store a newly created RoomSeasonTranslation in storage.
     *
     * @param CreateRoomSeasonTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomSeasonTranslationRequest $request)
    {
        $input = $request->all();

        $roomSeasonTranslation = $this->roomSeasonTranslationRepository->create($input);

        Flash::success('Room Season Translation saved successfully.');

        return redirect(route('admin.rooms.roomSeasonTranslations.index'));
    }

    /**
     * Display the specified RoomSeasonTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomSeasonTranslation = $this->roomSeasonTranslationRepository->findWithoutFail($id);

        if (empty($roomSeasonTranslation)) {
            Flash::error('Room Season Translation not found');

            return redirect(route('admin.rooms.roomSeasonTranslations.index'));
        }

        return view('admin.rooms.room_season_translations.show')->with('roomSeasonTranslation', $roomSeasonTranslation);
    }

    /**
     * Show the form for editing the specified RoomSeasonTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomSeasonTranslation = $this->roomSeasonTranslationRepository->findWithoutFail($id);

        if (empty($roomSeasonTranslation)) {
            Flash::error('Room Season Translation not found');

            return redirect(route('admin.rooms.roomSeasonTranslations.index'));
        }

        return view('admin.rooms.room_season_translations.edit')->with('roomSeasonTranslation', $roomSeasonTranslation);
    }

    /**
     * Update the specified RoomSeasonTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateRoomSeasonTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomSeasonTranslationRequest $request)
    {
        $roomSeasonTranslation = $this->roomSeasonTranslationRepository->findWithoutFail($id);

        if (empty($roomSeasonTranslation)) {
            Flash::error('Room Season Translation not found');

            return redirect(route('admin.rooms.roomSeasonTranslations.index'));
        }

        $roomSeasonTranslation = $this->roomSeasonTranslationRepository->update($request->all(), $id);

        Flash::success('Room Season Translation updated successfully.');

        return redirect(route('admin.rooms.roomSeasonTranslations.index'));
    }

    /**
     * Remove the specified RoomSeasonTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomSeasonTranslation = $this->roomSeasonTranslationRepository->findWithoutFail($id);

        if (empty($roomSeasonTranslation)) {
            Flash::error('Room Season Translation not found');

            return redirect(route('admin.rooms.roomSeasonTranslations.index'));
        }

        $this->roomSeasonTranslationRepository->delete($id);

        Flash::success('Room Season Translation deleted successfully.');

        return redirect(route('admin.rooms.roomSeasonTranslations.index'));
    }
}
