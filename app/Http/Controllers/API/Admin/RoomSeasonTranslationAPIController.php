<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateRoomSeasonTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateRoomSeasonTranslationAPIRequest;
use App\Models\Admin\RoomSeasonTranslation;
use App\Repositories\Admin\RoomSeasonTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RoomSeasonTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class RoomSeasonTranslationAPIController extends AppBaseController
{
    /** @var  RoomSeasonTranslationRepository */
    private $roomSeasonTranslationRepository;

    public function __construct(RoomSeasonTranslationRepository $roomSeasonTranslationRepo)
    {
        $this->roomSeasonTranslationRepository = $roomSeasonTranslationRepo;
    }

    /**
     * Display a listing of the RoomSeasonTranslation.
     * GET|HEAD /roomSeasonTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomSeasonTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->roomSeasonTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $roomSeasonTranslations = $this->roomSeasonTranslationRepository->all();

        return $this->sendResponse($roomSeasonTranslations->toArray(), 'Room Season Translations retrieved successfully');
    }

    /**
     * Store a newly created RoomSeasonTranslation in storage.
     * POST /roomSeasonTranslations
     *
     * @param CreateRoomSeasonTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomSeasonTranslationAPIRequest $request)
    {
        $input = $request->all();

        $roomSeasonTranslations = $this->roomSeasonTranslationRepository->create($input);

        return $this->sendResponse($roomSeasonTranslations->toArray(), 'Room Season Translation saved successfully');
    }

    /**
     * Display the specified RoomSeasonTranslation.
     * GET|HEAD /roomSeasonTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RoomSeasonTranslation $roomSeasonTranslation */
        $roomSeasonTranslation = $this->roomSeasonTranslationRepository->findWithoutFail($id);

        if (empty($roomSeasonTranslation)) {
            return $this->sendError('Room Season Translation not found');
        }

        return $this->sendResponse($roomSeasonTranslation->toArray(), 'Room Season Translation retrieved successfully');
    }

    /**
     * Update the specified RoomSeasonTranslation in storage.
     * PUT/PATCH /roomSeasonTranslations/{id}
     *
     * @param  int $id
     * @param UpdateRoomSeasonTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomSeasonTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var RoomSeasonTranslation $roomSeasonTranslation */
        $roomSeasonTranslation = $this->roomSeasonTranslationRepository->findWithoutFail($id);

        if (empty($roomSeasonTranslation)) {
            return $this->sendError('Room Season Translation not found');
        }

        $roomSeasonTranslation = $this->roomSeasonTranslationRepository->update($input, $id);

        return $this->sendResponse($roomSeasonTranslation->toArray(), 'RoomSeasonTranslation updated successfully');
    }

    /**
     * Remove the specified RoomSeasonTranslation from storage.
     * DELETE /roomSeasonTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RoomSeasonTranslation $roomSeasonTranslation */
        $roomSeasonTranslation = $this->roomSeasonTranslationRepository->findWithoutFail($id);

        if (empty($roomSeasonTranslation)) {
            return $this->sendError('Room Season Translation not found');
        }

        $roomSeasonTranslation->delete();

        return $this->sendResponse($id, 'Room Season Translation deleted successfully');
    }
}
