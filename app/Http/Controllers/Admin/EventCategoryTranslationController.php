<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateEventCategoryTranslationRequest;
use App\Http\Requests\Admin\UpdateEventCategoryTranslationRequest;
use App\Models\Admin\EventCategory;
use App\Repositories\Admin\EventCategoryRepository;
use App\Repositories\Admin\EventCategoryTranslationRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventCategoryTranslationController extends AppBaseController
{
    /** @var  EventCategoryTranslationRepository */
    private $eventCategoryTranslationRepository;

    /** @var  EventCategoryRepository */
    private $eventCategoryRepository;


    public function __construct(
        EventCategoryTranslationRepository $eventCategoryTranslationRepo,
        EventCategoryRepository $eventCategoryRepo)
    {
        $this->eventCategoryTranslationRepository = $eventCategoryTranslationRepo;
        $this->eventCategoryRepository = $eventCategoryRepo;
    }

    /**
     * Display a listing of the EventCategoryTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventCategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $eventCategoryTranslations = $this->eventCategoryTranslationRepository->all();

        return view('admin.events.event_category_translations.index')
            ->with('eventCategoryTranslations', $eventCategoryTranslations);
    }

    /**
     * Show the form for creating a new EventCategoryTranslation.
     *
     * @return Response
     */
    public function create()
    {

        return view('admin.events.event_category_translations.create');
    }

    /**
     * Store a newly created EventCategoryTranslation in storage.
     *
     * @param CreateEventCategoryTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateEventCategoryTranslationRequest $request)
    {
        // save EventCategory
        $eventCategory = $this->saveEventCategory($request);

        // save EventCategoryTranslation
        $eventCategoryTranslation = $this->saveEventCategoryTranslation($request, $eventCategory);

        Flash::success('Event Category Translation saved successfully.');

        return redirect(route('admin.eventCategories.index'));
    }

    /**
     * Display the specified EventCategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventCategoryTranslation = $this->eventCategoryTranslationRepository->findWithoutFail($id);

        if (empty($eventCategoryTranslation)) {
            Flash::error('Event Category Translation not found');

            return redirect(route('admin.eventCategories.index'));
        }

        return view('admin.events.event_category_translations.show')->with('eventCategoryTranslation', $eventCategoryTranslation);
    }

    /**
     * Show the form for editing the specified EventCategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventCategoryTranslation = $this->eventCategoryTranslationRepository->findWithoutFail($id);

        $eventCategory = EventCategory::findOrFail($eventCategoryTranslation->event_category_id);
        $code = $eventCategory->code;

        if (empty($eventCategoryTranslation)) {
            Flash::error('Event Category Translation not found');

            return redirect(route('admin.eventCategories.index'));
        }

        return view('admin.events.event_category_translations.edit',compact('code'))->with('eventCategoryTranslation', $eventCategoryTranslation);
    }

    /**
     * Update the specified EventCategoryTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateEventCategoryTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventCategoryTranslationRequest $request)
    {
        $eventCategoryTranslation = $this->eventCategoryTranslationRepository->findWithoutFail($id);

        if (empty($eventCategoryTranslation)) {
            Flash::error('Event Category Translation not found');

            return redirect(route('admin.eventCategories.index'));
        }

        // get EventCategory
        $eventCategory = EventCategory::find( $eventCategoryTranslation->event_category_id );

        // save EventCategoryTranslation
        $eventCategoryTranslation = $this->saveEventCategoryTranslation($request, $eventCategory, $eventCategoryTranslation);

        Flash::success('Event Category Translation updated successfully.');

        return redirect(route('admin.eventCategories.index'));
    }

     /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $eventCategory
     *
     * @return EventCategory $eventCategory
     */
    public function saveEventCategory($request, $eventCategory = null)
    {
        //data model
        $inputEventCategory = $request->only(['code', 'status_id']);
        $inputEventCategory['slug'] = str_slug($request->input('name'), '-');

        // if creating a newly model
        if ($eventCategory == null) {
            $eventCategory = $this->eventCategoryRepository->create($inputEventCategory);
        }
        // if updating a existing model
        else {
            $eventCategory->update($inputEventCategory);
        }

        return $eventCategory;
    }

    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $eventCategoryTranslation
     *
     * @return EventCategoryTranslation $eventCategoryTranslation
     */
    public function saveEventCategoryTranslation($request, $eventCategory, $eventCategoryTranslation = null)
    {

        //data eventCategoryTranslation
        $inputEventCategoryTranslation = $request->only(['language_id', 'name', 'description']);
        $inputEventCategoryTranslation['event_category_id'] = $eventCategory->id;

        // if creating a newly model
        if ($eventCategoryTranslation == null) {
            $eventCategoryTranslation = $this->eventCategoryTranslationRepository->create($inputEventCategoryTranslation);
        }
        // if updating a existing model
        else {
            $eventCategoryTranslation->update($inputEventCategoryTranslation);
            // $eventCategoryTranslation = $this->eventCategoryTranslationRepository->update($request->all(), $id);
        }

        return $eventCategoryTranslation;
    }

    /**
     * Remove the specified EventCategoryTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventCategoryTranslation = $this->eventCategoryTranslationRepository->findWithoutFail($id);

        if (empty($eventCategoryTranslation)) {
            Flash::error('Event Category Translation not found');

            return redirect(route('admin.eventCategories.index'));
        }

        $this->eventCategoryTranslationRepository->delete($id);

        Flash::success('Event Category Translation deleted successfully.');

        return redirect(route('admin.eventCategories.index'));
    }
}
