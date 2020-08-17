<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateRoomTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateRoomTranslationAPIRequest;
use App\Models\Admin\RoomTranslation;
use App\Repositories\Admin\RoomTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RoomTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class RoomTranslationAPIController extends AppBaseController
{
    /** @var  RoomTranslationRepository */
    private $roomTranslationRepository;

    public function __construct(RoomTranslationRepository $roomTranslationRepo)
    {
        $this->roomTranslationRepository = $roomTranslationRepo;
    }

    /**
     * Display a listing of the RoomTranslation.
     * GET|HEAD /roomTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->roomTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $roomTranslations = $this->roomTranslationRepository->all();

        return $this->sendResponse($roomTranslations->toArray(), 'Room Translations retrieved successfully');
    }

    /**
     * Store a newly created RoomTranslation in storage.
     * POST /roomTranslations
     *
     * @param CreateRoomTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomTranslationAPIRequest $request)
    {
        $input = $request->all();

        $roomTranslations = $this->roomTranslationRepository->create($input);

        return $this->sendResponse($roomTranslations->toArray(), 'Room Translation saved successfully');
    }

    /**
     * Display the specified RoomTranslation.
     * GET|HEAD /roomTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RoomTranslation $roomTranslation */
        $roomTranslation = $this->roomTranslationRepository->findWithoutFail($id);

        if (empty($roomTranslation)) {
            return $this->sendError('Room Translation not found');
        }

        return $this->sendResponse($roomTranslation->toArray(), 'Room Translation retrieved successfully');
    }

    /**
     * Update the specified RoomTranslation in storage.
     * PUT/PATCH /roomTranslations/{id}
     *
     * @param  int $id
     * @param UpdateRoomTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var RoomTranslation $roomTranslation */
        $roomTranslation = $this->roomTranslationRepository->findWithoutFail($id);

        if (empty($roomTranslation)) {
            return $this->sendError('Room Translation not found');
        }

        $roomTranslation = $this->roomTranslationRepository->update($input, $id);

        return $this->sendResponse($roomTranslation->toArray(), 'RoomTranslation updated successfully');
    }

    /**
     * Remove the specified RoomTranslation from storage.
     * DELETE /roomTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RoomTranslation $roomTranslation */
        $roomTranslation = $this->roomTranslationRepository->findWithoutFail($id);

        if (empty($roomTranslation)) {
            return $this->sendError('Room Translation not found');
        }

        $roomTranslation->delete();

        return $this->sendResponse($id, 'Room Translation deleted successfully');
    }
}
