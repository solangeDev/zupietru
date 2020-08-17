<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\UtilController;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateEventTranslationRequest;
use App\Http\Requests\Admin\UpdateEventTranslationRequest;
use App\Models\Admin\Event;
use App\Repositories\Admin\EventRepository;
use App\Repositories\Admin\EventTranslationRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventTranslationController extends AppBaseController
{
    /** @var  EventTranslationRepository */
    private $eventTranslationRepository;

    /** @var  EventTranslationRepository */
    private $eventRepository;

    public function __construct(
        EventTranslationRepository $eventTranslationRepo,
        EventRepository $eventRepo)
    {
        $this->eventTranslationRepository = $eventTranslationRepo;
        $this->eventRepository = $eventRepo;
    }

    /**
     * Display a listing of the EventTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventTranslationRepository->pushCriteria(new RequestCriteria($request));
        $eventTranslations = $this->eventTranslationRepository->all();

        return view('admin.events.event_translations.index')
            ->with('eventTranslations', $eventTranslations);
    }

    /**
     * Show the form for creating a new EventTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.events.event_translations.create')
                ->with('subtitle', 'back_general_create')
                ->with('lang', UtilController::langAll())
                ->with('event_category', UtilController::categoriesEvent());
    }

    /**
     * Store a newly created EventTranslation in storage.
     *
     * @param CreateEventTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateEventTranslationRequest $request)
    {
        try{
            // save EventCategory
            $event = $this->saveEvent($request);
        }catch(Exeption $e){
            return $e->getMessage();
        }

        try{
            // save EventTranslation
            $eventTranslation = $this->saveEventTranslation($request, $event);
        }catch(Exeption $e){
            return $e->getMessage();
        }

        Flash::success('Event Translation saved successfully.');

        return redirect(route('admin.events.index'));
    }

    /**
     * Save (store/update) a model in event.
     * -> ERICK
     * @param $request
     * @param $event
     *
     * @return Event $event
     */
    public function saveEvent($request, $event = null)
    {
        try{
            //data model
            $inputEvent['slug']                 = str_slug($request->input('title'), '-');
            $inputEvent['end_date']             = Carbon::createFromFormat('d/m/Y', $request->end_date)->toDateTimeString();
            $inputEvent['start_date']           = Carbon::createFromFormat('d/m/Y', $request->start_date)->toDateTimeString();
            $inputEvent['event_category_id']    = $request->event_category_id;

            // if creating a newly model
            if ($event == null) {
                $event = $this->eventRepository->create($inputEvent);

                /* Registrar en la tabla polimorfica para enlazar el enevto con seos */
                $row = UtilController::saveRow($event);
                /* Registrar en la tabla seo */
                $seos = UtilController::saveSeo($row->id);
                /* Registrar en la tabla seo_translations */
                $seoTranslation = UtilController::saveSeoTranlation($request,$seos->id);
            } else { // if updating a existing model
                $event = $this->eventRepository->update($inputEvent, $request->event_id);
                /* Registrar en la tabla seo_translations */
                $seoTranslation = UtilController::saveSeoTranlation($request,$request->seos_id);
            }
        }catch(Exeption $e){
            return $e->getMessage();
        }

        return $event;
    }

    /**
     * Save (store/update) a model in event.
     *
     * @param $request
     * @param $eventTranslation
     *
     * @return EventTranslation $eventTranslation
     */
    public function saveEventTranslation($request, $event, $eventTranslation = null)
    {

        //data productTranslation
        $inputEventTranslation = $request->only(['language_id', 'title', 'subtitle', 'description']);
        $inputEventTranslation['event_id'] = $event->id;

        // if creating a newly model
        if ($eventTranslation == null) {
            $eventTranslation = $this->eventTranslationRepository->create($inputEventTranslation);
        }
        // if updating a existing model
        else {
            // $eventTranslation->update($inputEventTranslation);
            $eventTranslation = $this->eventTranslationRepository->update($inputEventTranslation, $eventTranslation->id);
        }

        return $eventTranslation;
    }

    /**
     * Display the specified EventTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventTranslation = $this->eventTranslationRepository->findWithoutFail($id);

        if (empty($eventTranslation)) {
            Flash::error('Event Translation not found');

            return redirect(route('admin.events.index'));
        }

        return view('admin.events.event_translations.show')->with('eventTranslation', $eventTranslation);
    }

    /**
     * Show the form for editing the specified EventTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventTranslation = $this->eventTranslationRepository->findWithoutFail($id);

        $event= Event::find($eventTranslation->event_id);

        if (empty($eventTranslation)) {
            Flash::error('Event Translation not found');

            return redirect(route('admin.events.index'));
        }

        return view('admin.events.event_translations.create')
                ->with('subtitle', 'back_general_edit')
                ->with('event', $event)
                ->with('eventTranslation', $eventTranslation)
                ->with('lang', UtilController::langAll())
                ->with('seos', UtilController::seoTranslations($event->row->seo->id))
                ->with('event_category', UtilController::categoriesEvent());
    }

    /**
     * Update the specified EventTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateEventTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventTranslationRequest $request)
    {
        $eventTranslation = $this->eventTranslationRepository->findWithoutFail($id);

        if (empty($eventTranslation)) {
            Flash::error('Event Translation not found');

            return redirect(route('admin.events.index'));
        }

        // get Event
        $event = Event::find( $eventTranslation->event_id );

        // save EventCategory
        $event = $this->saveEvent($request, $event);

        // save EventTranslation
        $eventTranslation = $this->saveEventTranslation($request, $event, $eventTranslation);

        Flash::success('Event Translation updated successfully.');

        return redirect(route('admin.events.index'));
    }

    /**
     * Remove the specified EventTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventTranslation = $this->eventTranslationRepository->findWithoutFail($id);

        if (empty($eventTranslation)) {
            Flash::error('Event Translation not found');

            return redirect(route('admin.events.index'));
        }

        $this->eventTranslationRepository->delete($id);

        Flash::success('Event Translation deleted successfully.');

        return redirect(route('admin.events.index'));
    }
}
