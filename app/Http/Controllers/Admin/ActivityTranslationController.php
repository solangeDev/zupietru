<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateActivityTranslationRequest;
use App\Http\Requests\Admin\UpdateActivityTranslationRequest;
use App\Repositories\Admin\ActivityTranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ActivityTranslationController extends AppBaseController
{
    /** @var  ActivityTranslationRepository */
    private $activityTranslationRepository;

    public function __construct(ActivityTranslationRepository $activityTranslationRepo)
    {
        $this->activityTranslationRepository = $activityTranslationRepo;
    }

    /**
     * Display a listing of the ActivityTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->activityTranslationRepository->pushCriteria(new RequestCriteria($request));
        $activityTranslations = $this->activityTranslationRepository->all();

        return view('admin.activities.activity_translations.index')
            ->with('activityTranslations', $activityTranslations);
    }

    /**
     * Show the form for creating a new ActivityTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.activities.activity_translations.create');
    }

    /**
     * Store a newly created ActivityTranslation in storage.
     *
     * @param CreateActivityTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityTranslationRequest $request)
    {
        $input = $request->all();

        $activityTranslation = $this->activityTranslationRepository->create($input);

        Flash::success('Activity Translation saved successfully.');

        return redirect(route('admin.activities.activityTranslations.index'));
    }

    /**
     * Display the specified ActivityTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activityTranslation = $this->activityTranslationRepository->findWithoutFail($id);

        if (empty($activityTranslation)) {
            Flash::error('Activity Translation not found');

            return redirect(route('admin.activities.activityTranslations.index'));
        }

        return view('admin.activities.activity_translations.show')->with('activityTranslation', $activityTranslation);
    }

    /**
     * Show the form for editing the specified ActivityTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activityTranslation = $this->activityTranslationRepository->findWithoutFail($id);

        if (empty($activityTranslation)) {
            Flash::error('Activity Translation not found');

            return redirect(route('admin.activities.activityTranslations.index'));
        }

        return view('admin.activities.activity_translations.edit')->with('activityTranslation', $activityTranslation);
    }

    /**
     * Update the specified ActivityTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateActivityTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivityTranslationRequest $request)
    {
        $activityTranslation = $this->activityTranslationRepository->findWithoutFail($id);

        if (empty($activityTranslation)) {
            Flash::error('Activity Translation not found');

            return redirect(route('admin.activities.activityTranslations.index'));
        }

        $activityTranslation = $this->activityTranslationRepository->update($request->all(), $id);

        Flash::success('Activity Translation updated successfully.');

        return redirect(route('admin.activities.activityTranslations.index'));
    }

    /**
     * Remove the specified ActivityTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activityTranslation = $this->activityTranslationRepository->findWithoutFail($id);

        if (empty($activityTranslation)) {
            Flash::error('Activity Translation not found');

            return redirect(route('admin.activities.activityTranslations.index'));
        }

        $this->activityTranslationRepository->delete($id);

        Flash::success('Activity Translation deleted successfully.');

        return redirect(route('admin.activities.activityTranslations.index'));
    }
}
