<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateActivityTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateActivityTranslationAPIRequest;
use App\Models\Admin\ActivityTranslation;
use App\Repositories\Admin\ActivityTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ActivityTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class ActivityTranslationAPIController extends AppBaseController
{
    /** @var  ActivityTranslationRepository */
    private $activityTranslationRepository;

    public function __construct(ActivityTranslationRepository $activityTranslationRepo)
    {
        $this->activityTranslationRepository = $activityTranslationRepo;
    }

    /**
     * Display a listing of the ActivityTranslation.
     * GET|HEAD /activityTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->activityTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->activityTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $activityTranslations = $this->activityTranslationRepository->all();

        return $this->sendResponse($activityTranslations->toArray(), 'Activity Translations retrieved successfully');
    }

    /**
     * Store a newly created ActivityTranslation in storage.
     * POST /activityTranslations
     *
     * @param CreateActivityTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityTranslationAPIRequest $request)
    {
        $input = $request->all();

        $activityTranslations = $this->activityTranslationRepository->create($input);

        return $this->sendResponse($activityTranslations->toArray(), 'Activity Translation saved successfully');
    }

    /**
     * Display the specified ActivityTranslation.
     * GET|HEAD /activityTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ActivityTranslation $activityTranslation */
        $activityTranslation = $this->activityTranslationRepository->findWithoutFail($id);

        if (empty($activityTranslation)) {
            return $this->sendError('Activity Translation not found');
        }

        return $this->sendResponse($activityTranslation->toArray(), 'Activity Translation retrieved successfully');
    }

    /**
     * Update the specified ActivityTranslation in storage.
     * PUT/PATCH /activityTranslations/{id}
     *
     * @param  int $id
     * @param UpdateActivityTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivityTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ActivityTranslation $activityTranslation */
        $activityTranslation = $this->activityTranslationRepository->findWithoutFail($id);

        if (empty($activityTranslation)) {
            return $this->sendError('Activity Translation not found');
        }

        $activityTranslation = $this->activityTranslationRepository->update($input, $id);

        return $this->sendResponse($activityTranslation->toArray(), 'ActivityTranslation updated successfully');
    }

    /**
     * Remove the specified ActivityTranslation from storage.
     * DELETE /activityTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ActivityTranslation $activityTranslation */
        $activityTranslation = $this->activityTranslationRepository->findWithoutFail($id);

        if (empty($activityTranslation)) {
            return $this->sendError('Activity Translation not found');
        }

        $activityTranslation->delete();

        return $this->sendResponse($id, 'Activity Translation deleted successfully');
    }
}
