<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateServiceCategoryTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateServiceCategoryTranslationAPIRequest;
use App\Models\Admin\ServiceCategoryTranslation;
use App\Repositories\Admin\ServiceCategoryTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ServiceCategoryTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class ServiceCategoryTranslationAPIController extends AppBaseController
{
    /** @var  ServiceCategoryTranslationRepository */
    private $serviceCategoryTranslationRepository;

    public function __construct(ServiceCategoryTranslationRepository $serviceCategoryTranslationRepo)
    {
        $this->serviceCategoryTranslationRepository = $serviceCategoryTranslationRepo;
    }

    /**
     * Display a listing of the ServiceCategoryTranslation.
     * GET|HEAD /serviceCategoryTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviceCategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->serviceCategoryTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $serviceCategoryTranslations = $this->serviceCategoryTranslationRepository->all();

        return $this->sendResponse($serviceCategoryTranslations->toArray(), 'Service Category Translations retrieved successfully');
    }

    /**
     * Store a newly created ServiceCategoryTranslation in storage.
     * POST /serviceCategoryTranslations
     *
     * @param CreateServiceCategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceCategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        $serviceCategoryTranslations = $this->serviceCategoryTranslationRepository->create($input);

        return $this->sendResponse($serviceCategoryTranslations->toArray(), 'Service Category Translation saved successfully');
    }

    /**
     * Display the specified ServiceCategoryTranslation.
     * GET|HEAD /serviceCategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ServiceCategoryTranslation $serviceCategoryTranslation */
        $serviceCategoryTranslation = $this->serviceCategoryTranslationRepository->findWithoutFail($id);

        if (empty($serviceCategoryTranslation)) {
            return $this->sendError('Service Category Translation not found');
        }

        return $this->sendResponse($serviceCategoryTranslation->toArray(), 'Service Category Translation retrieved successfully');
    }

    /**
     * Update the specified ServiceCategoryTranslation in storage.
     * PUT/PATCH /serviceCategoryTranslations/{id}
     *
     * @param  int $id
     * @param UpdateServiceCategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceCategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ServiceCategoryTranslation $serviceCategoryTranslation */
        $serviceCategoryTranslation = $this->serviceCategoryTranslationRepository->findWithoutFail($id);

        if (empty($serviceCategoryTranslation)) {
            return $this->sendError('Service Category Translation not found');
        }

        $serviceCategoryTranslation = $this->serviceCategoryTranslationRepository->update($input, $id);

        return $this->sendResponse($serviceCategoryTranslation->toArray(), 'ServiceCategoryTranslation updated successfully');
    }

    /**
     * Remove the specified ServiceCategoryTranslation from storage.
     * DELETE /serviceCategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ServiceCategoryTranslation $serviceCategoryTranslation */
        $serviceCategoryTranslation = $this->serviceCategoryTranslationRepository->findWithoutFail($id);

        if (empty($serviceCategoryTranslation)) {
            return $this->sendError('Service Category Translation not found');
        }

        $serviceCategoryTranslation->delete();

        return $this->sendResponse($id, 'Service Category Translation deleted successfully');
    }
}
