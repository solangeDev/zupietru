<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateEventCategoryTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateEventCategoryTranslationAPIRequest;
use App\Models\Admin\EventCategoryTranslation;
use App\Repositories\Admin\EventCategoryTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EventCategoryTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class EventCategoryTranslationAPIController extends AppBaseController
{
    /** @var  EventCategoryTranslationRepository */
    private $eventCategoryTranslationRepository;

    public function __construct(EventCategoryTranslationRepository $eventCategoryTranslationRepo)
    {
        $this->eventCategoryTranslationRepository = $eventCategoryTranslationRepo;
    }

    /**
     * Display a listing of the EventCategoryTranslation.
     * GET|HEAD /eventCategoryTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventCategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->eventCategoryTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $eventCategoryTranslations = $this->eventCategoryTranslationRepository->all();

        return $this->sendResponse($eventCategoryTranslations->toArray(), 'Event Category Translations retrieved successfully');
    }

    /**
     * Store a newly created EventCategoryTranslation in storage.
     * POST /eventCategoryTranslations
     *
     * @param CreateEventCategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEventCategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        $eventCategoryTranslations = $this->eventCategoryTranslationRepository->create($input);

        return $this->sendResponse($eventCategoryTranslations->toArray(), 'Event Category Translation saved successfully');
    }

    /**
     * Display the specified EventCategoryTranslation.
     * GET|HEAD /eventCategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EventCategoryTranslation $eventCategoryTranslation */
        $eventCategoryTranslation = $this->eventCategoryTranslationRepository->findWithoutFail($id);

        if (empty($eventCategoryTranslation)) {
            return $this->sendError('Event Category Translation not found');
        }

        return $this->sendResponse($eventCategoryTranslation->toArray(), 'Event Category Translation retrieved successfully');
    }

    /**
     * Update the specified EventCategoryTranslation in storage.
     * PUT/PATCH /eventCategoryTranslations/{id}
     *
     * @param  int $id
     * @param UpdateEventCategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventCategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var EventCategoryTranslation $eventCategoryTranslation */
        $eventCategoryTranslation = $this->eventCategoryTranslationRepository->findWithoutFail($id);

        if (empty($eventCategoryTranslation)) {
            return $this->sendError('Event Category Translation not found');
        }

        $eventCategoryTranslation = $this->eventCategoryTranslationRepository->update($input, $id);

        return $this->sendResponse($eventCategoryTranslation->toArray(), 'EventCategoryTranslation updated successfully');
    }

    /**
     * Remove the specified EventCategoryTranslation from storage.
     * DELETE /eventCategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EventCategoryTranslation $eventCategoryTranslation */
        $eventCategoryTranslation = $this->eventCategoryTranslationRepository->findWithoutFail($id);

        if (empty($eventCategoryTranslation)) {
            return $this->sendError('Event Category Translation not found');
        }

        $eventCategoryTranslation->delete();

        return $this->sendResponse($id, 'Event Category Translation deleted successfully');
    }
}
