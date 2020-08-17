<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateServiceCategoryTranslationRequest;
use App\Http\Requests\Admin\UpdateServiceCategoryTranslationRequest;
use App\Repositories\Admin\ServiceCategoryTranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServiceCategoryTranslationController extends AppBaseController
{
    /** @var  ServiceCategoryTranslationRepository */
    private $serviceCategoryTranslationRepository;

    public function __construct(ServiceCategoryTranslationRepository $serviceCategoryTranslationRepo)
    {
        $this->serviceCategoryTranslationRepository = $serviceCategoryTranslationRepo;
    }

    /**
     * Display a listing of the ServiceCategoryTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviceCategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $serviceCategoryTranslations = $this->serviceCategoryTranslationRepository->all();

        return view('admin.rooms.service_category_translations.index')
            ->with('serviceCategoryTranslations', $serviceCategoryTranslations);
    }

    /**
     * Show the form for creating a new ServiceCategoryTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.rooms.service_category_translations.create');
    }

    /**
     * Store a newly created ServiceCategoryTranslation in storage.
     *
     * @param CreateServiceCategoryTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceCategoryTranslationRequest $request)
    {
        $input = $request->all();

        $serviceCategoryTranslation = $this->serviceCategoryTranslationRepository->create($input);

        Flash::success('Service Category Translation saved successfully.');

        return redirect(route('admin.rooms.serviceCategoryTranslations.index'));
    }

    /**
     * Display the specified ServiceCategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceCategoryTranslation = $this->serviceCategoryTranslationRepository->findWithoutFail($id);

        if (empty($serviceCategoryTranslation)) {
            Flash::error('Service Category Translation not found');

            return redirect(route('admin.rooms.serviceCategoryTranslations.index'));
        }

        return view('admin.rooms.service_category_translations.show')->with('serviceCategoryTranslation', $serviceCategoryTranslation);
    }

    /**
     * Show the form for editing the specified ServiceCategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceCategoryTranslation = $this->serviceCategoryTranslationRepository->findWithoutFail($id);

        if (empty($serviceCategoryTranslation)) {
            Flash::error('Service Category Translation not found');

            return redirect(route('admin.rooms.serviceCategoryTranslations.index'));
        }

        return view('admin.rooms.service_category_translations.edit')->with('serviceCategoryTranslation', $serviceCategoryTranslation);
    }

    /**
     * Update the specified ServiceCategoryTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateServiceCategoryTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceCategoryTranslationRequest $request)
    {
        $serviceCategoryTranslation = $this->serviceCategoryTranslationRepository->findWithoutFail($id);

        if (empty($serviceCategoryTranslation)) {
            Flash::error('Service Category Translation not found');

            return redirect(route('admin.rooms.serviceCategoryTranslations.index'));
        }

        $serviceCategoryTranslation = $this->serviceCategoryTranslationRepository->update($request->all(), $id);

        Flash::success('Service Category Translation updated successfully.');

        return redirect(route('admin.rooms.serviceCategoryTranslations.index'));
    }

    /**
     * Remove the specified ServiceCategoryTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceCategoryTranslation = $this->serviceCategoryTranslationRepository->findWithoutFail($id);

        if (empty($serviceCategoryTranslation)) {
            Flash::error('Service Category Translation not found');

            return redirect(route('admin.rooms.serviceCategoryTranslations.index'));
        }

        $this->serviceCategoryTranslationRepository->delete($id);

        Flash::success('Service Category Translation deleted successfully.');

        return redirect(route('admin.rooms.serviceCategoryTranslations.index'));
    }
}
