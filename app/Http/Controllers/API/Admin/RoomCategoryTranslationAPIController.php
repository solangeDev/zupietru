<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateRoomCategoryTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateRoomCategoryTranslationAPIRequest;
use App\Models\Admin\RoomCategoryTranslation;
use App\Repositories\Admin\RoomCategoryTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RoomCategoryTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class RoomCategoryTranslationAPIController extends AppBaseController
{
    /** @var  RoomCategoryTranslationRepository */
    private $roomCategoryTranslationRepository;

    public function __construct(RoomCategoryTranslationRepository $roomCategoryTranslationRepo)
    {
        $this->roomCategoryTranslationRepository = $roomCategoryTranslationRepo;
    }

    /**
     * Display a listing of the RoomCategoryTranslation.
     * GET|HEAD /roomCategoryTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomCategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->roomCategoryTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $roomCategoryTranslations = $this->roomCategoryTranslationRepository->all();

        return $this->sendResponse($roomCategoryTranslations->toArray(), 'Room Category Translations retrieved successfully');
    }

    /**
     * Store a newly created RoomCategoryTranslation in storage.
     * POST /roomCategoryTranslations
     *
     * @param CreateRoomCategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomCategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        $roomCategoryTranslations = $this->roomCategoryTranslationRepository->create($input);

        return $this->sendResponse($roomCategoryTranslations->toArray(), 'Room Category Translation saved successfully');
    }

    /**
     * Display the specified RoomCategoryTranslation.
     * GET|HEAD /roomCategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RoomCategoryTranslation $roomCategoryTranslation */
        $roomCategoryTranslation = $this->roomCategoryTranslationRepository->findWithoutFail($id);

        if (empty($roomCategoryTranslation)) {
            return $this->sendError('Room Category Translation not found');
        }

        return $this->sendResponse($roomCategoryTranslation->toArray(), 'Room Category Translation retrieved successfully');
    }

    /**
     * Update the specified RoomCategoryTranslation in storage.
     * PUT/PATCH /roomCategoryTranslations/{id}
     *
     * @param  int $id
     * @param UpdateRoomCategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomCategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var RoomCategoryTranslation $roomCategoryTranslation */
        $roomCategoryTranslation = $this->roomCategoryTranslationRepository->findWithoutFail($id);

        if (empty($roomCategoryTranslation)) {
            return $this->sendError('Room Category Translation not found');
        }

        $roomCategoryTranslation = $this->roomCategoryTranslationRepository->update($input, $id);

        return $this->sendResponse($roomCategoryTranslation->toArray(), 'RoomCategoryTranslation updated successfully');
    }

    /**
     * Remove the specified RoomCategoryTranslation from storage.
     * DELETE /roomCategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RoomCategoryTranslation $roomCategoryTranslation */
        $roomCategoryTranslation = $this->roomCategoryTranslationRepository->findWithoutFail($id);

        if (empty($roomCategoryTranslation)) {
            return $this->sendError('Room Category Translation not found');
        }

        $roomCategoryTranslation->delete();

        return $this->sendResponse($id, 'Room Category Translation deleted successfully');
    }
}
