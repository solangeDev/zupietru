<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\LanguageController;
use App\Http\Requests\Admin\CreateActivityCategoryTranslationRequest;
use App\Http\Requests\Admin\UpdateActivityCategoryTranslationRequest;
use App\Repositories\Admin\ActivityCategoryTranslationRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ActivityCategoryTranslationController extends AppBaseController
{
    /** @var  ActivityCategoryTranslationRepository */
    private $activityCategoryTranslationRepository;

    public function __construct(ActivityCategoryTranslationRepository $activityCategoryTranslationRepo)
    {
        $this->activityCategoryTranslationRepository = $activityCategoryTranslationRepo;
    }

    /**
     * Display a listing of the ActivityCategoryTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->activityCategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $activityCategoryTranslations = $this->activityCategoryTranslationRepository->all();

        return view('admin.activities.activity_category_translations.index')
            ->with('activityCategoryTranslations', $activityCategoryTranslations);
    }

    /**
     * Show the form for creating a new ActivityCategoryTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.activities.activity_category_translations.create');
    }

    /**
     * Store a newly created ActivityCategoryTranslation in storage.
     *
     * @param CreateActivityCategoryTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityCategoryTranslationRequest $request)
    {
        $input = $request->all();

        $activityCategoryTranslation = $this->activityCategoryTranslationRepository->create($input);

        Flash::success('Activity Category Translation saved successfully.');

        return redirect(route('admin.activities.activityCategoryTranslations.index'));
    }

    /**
     * Display the specified ActivityCategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activityCategoryTranslation = $this->activityCategoryTranslationRepository->findWithoutFail($id);

        if (empty($activityCategoryTranslation)) {
            Flash::error('Activity Category Translation not found');

            return redirect(route('admin.activities.activityCategoryTranslations.index'));
        }

        return view('admin.activities.activity_category_translations.show')->with('activityCategoryTranslation', $activityCategoryTranslation);
    }

    /**
     * Show the form for editing the specified ActivityCategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activityCategoryTranslation = $this->activityCategoryTranslationRepository->findWithoutFail($id);

        if (empty($activityCategoryTranslation)) {
            Flash::error('Activity Category Translation not found');

            return redirect(route('admin.activities.activityCategoryTranslations.index'));
        }

        return view('admin.activities.activity_category_translations.edit')->with('activityCategoryTranslation', $activityCategoryTranslation);
    }

    /**
     * Update the specified ActivityCategoryTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateActivityCategoryTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivityCategoryTranslationRequest $request)
    {
        $activityCategoryTranslation = $this->activityCategoryTranslationRepository->findWithoutFail($id);

        if (empty($activityCategoryTranslation)) {
            Flash::error('Activity Category Translation not found');

            return redirect(route('admin.activities.activityCategoryTranslations.index'));
        }

        $activityCategoryTranslation = $this->activityCategoryTranslationRepository->update($request->all(), $id);

        Flash::success('Activity Category Translation updated successfully.');

        return redirect(route('admin.activities.activityCategoryTranslations.index'));
    }

    /**
     * Remove the specified ActivityCategoryTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activityCategoryTranslation = $this->activityCategoryTranslationRepository->findWithoutFail($id);

        if (empty($activityCategoryTranslation)) {
            Flash::error('Activity Category Translation not found');

            return redirect(route('admin.activities.activityCategoryTranslations.index'));
        }

        $this->activityCategoryTranslationRepository->delete($id);

        Flash::success('Activity Category Translation deleted successfully.');

        return redirect(route('admin.activities.activityCategoryTranslations.index'));
    }
}
