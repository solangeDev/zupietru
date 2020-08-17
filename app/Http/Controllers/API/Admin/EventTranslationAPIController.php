<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateEventTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateEventTranslationAPIRequest;
use App\Models\Admin\EventTranslation;
use App\Repositories\Admin\EventTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EventTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class EventTranslationAPIController extends AppBaseController
{
    /** @var  EventTranslationRepository */
    private $eventTranslationRepository;

    public function __construct(EventTranslationRepository $eventTranslationRepo)
    {
        $this->eventTranslationRepository = $eventTranslationRepo;
    }

    /**
     * Display a listing of the EventTranslation.
     * GET|HEAD /eventTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->eventTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $eventTranslations = $this->eventTranslationRepository->all();

        return $this->sendResponse($eventTranslations->toArray(), 'Event Translations retrieved successfully');
    }

    /**
     * Store a newly created EventTranslation in storage.
     * POST /eventTranslations
     *
     * @param CreateEventTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEventTranslationAPIRequest $request)
    {
        $input = $request->all();

        $eventTranslations = $this->eventTranslationRepository->create($input);

        return $this->sendResponse($eventTranslations->toArray(), 'Event Translation saved successfully');
    }

    /**
     * Display the specified EventTranslation.
     * GET|HEAD /eventTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EventTranslation $eventTranslation */
        $eventTranslation = $this->eventTranslationRepository->findWithoutFail($id);

        if (empty($eventTranslation)) {
            return $this->sendError('Event Translation not found');
        }

        return $this->sendResponse($eventTranslation->toArray(), 'Event Translation retrieved successfully');
    }

    /**
     * Update the specified EventTranslation in storage.
     * PUT/PATCH /eventTranslations/{id}
     *
     * @param  int $id
     * @param UpdateEventTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var EventTranslation $eventTranslation */
        $eventTranslation = $this->eventTranslationRepository->findWithoutFail($id);

        if (empty($eventTranslation)) {
            return $this->sendError('Event Translation not found');
        }

        $eventTranslation = $this->eventTranslationRepository->update($input, $id);

        return $this->sendResponse($eventTranslation->toArray(), 'EventTranslation updated successfully');
    }

    /**
     * Remove the specified EventTranslation from storage.
     * DELETE /eventTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EventTranslation $eventTranslation */
        $eventTranslation = $this->eventTranslationRepository->findWithoutFail($id);

        if (empty($eventTranslation)) {
            return $this->sendError('Event Translation not found');
        }

        $eventTranslation->delete();

        return $this->sendResponse($id, 'Event Translation deleted successfully');
    }
}
