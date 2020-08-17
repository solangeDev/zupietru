<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateActivityCategoryTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateActivityCategoryTranslationAPIRequest;
use App\Models\Admin\ActivityCategoryTranslation;
use App\Repositories\Admin\ActivityCategoryTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ActivityCategoryTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class ActivityCategoryTranslationAPIController extends AppBaseController
{
    /** @var  ActivityCategoryTranslationRepository */
    private $activityCategoryTranslationRepository;

    public function __construct(ActivityCategoryTranslationRepository $activityCategoryTranslationRepo)
    {
        $this->activityCategoryTranslationRepository = $activityCategoryTranslationRepo;
    }

    /**
     * Display a listing of the ActivityCategoryTranslation.
     * GET|HEAD /activityCategoryTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->activityCategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->activityCategoryTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $activityCategoryTranslations = $this->activityCategoryTranslationRepository->all();

        return $this->sendResponse($activityCategoryTranslations->toArray(), 'Activity Category Translations retrieved successfully');
    }

    /**
     * Store a newly created ActivityCategoryTranslation in storage.
     * POST /activityCategoryTranslations
     *
     * @param CreateActivityCategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityCategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        $activityCategoryTranslations = $this->activityCategoryTranslationRepository->create($input);

        return $this->sendResponse($activityCategoryTranslations->toArray(), 'Activity Category Translation saved successfully');
    }

    /**
     * Display the specified ActivityCategoryTranslation.
     * GET|HEAD /activityCategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ActivityCategoryTranslation $activityCategoryTranslation */
        $activityCategoryTranslation = $this->activityCategoryTranslationRepository->findWithoutFail($id);

        if (empty($activityCategoryTranslation)) {
            return $this->sendError('Activity Category Translation not found');
        }

        return $this->sendResponse($activityCategoryTranslation->toArray(), 'Activity Category Translation retrieved successfully');
    }

    /**
     * Update the specified ActivityCategoryTranslation in storage.
     * PUT/PATCH /activityCategoryTranslations/{id}
     *
     * @param  int $id
     * @param UpdateActivityCategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivityCategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ActivityCategoryTranslation $activityCategoryTranslation */
        $activityCategoryTranslation = $this->activityCategoryTranslationRepository->findWithoutFail($id);

        if (empty($activityCategoryTranslation)) {
            return $this->sendError('Activity Category Translation not found');
        }

        $activityCategoryTranslation = $this->activityCategoryTranslationRepository->update($input, $id);

        return $this->sendResponse($activityCategoryTranslation->toArray(), 'ActivityCategoryTranslation updated successfully');
    }

    /**
     * Remove the specified ActivityCategoryTranslation from storage.
     * DELETE /activityCategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ActivityCategoryTranslation $activityCategoryTranslation */
        $activityCategoryTranslation = $this->activityCategoryTranslationRepository->findWithoutFail($id);

        if (empty($activityCategoryTranslation)) {
            return $this->sendError('Activity Category Translation not found');
        }

        $activityCategoryTranslation->delete();

        return $this->sendResponse($id, 'Activity Category Translation deleted successfully');
    }
}
