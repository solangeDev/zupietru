<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateServiceTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateServiceTranslationAPIRequest;
use App\Models\Admin\ServiceTranslation;
use App\Repositories\Admin\ServiceTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ServiceTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class ServiceTranslationAPIController extends AppBaseController
{
    /** @var  ServiceTranslationRepository */
    private $serviceTranslationRepository;

    public function __construct(ServiceTranslationRepository $serviceTranslationRepo)
    {
        $this->serviceTranslationRepository = $serviceTranslationRepo;
    }

    /**
     * Display a listing of the ServiceTranslation.
     * GET|HEAD /serviceTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviceTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->serviceTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $serviceTranslations = $this->serviceTranslationRepository->all();

        return $this->sendResponse($serviceTranslations->toArray(), 'Service Translations retrieved successfully');
    }

    /**
     * Store a newly created ServiceTranslation in storage.
     * POST /serviceTranslations
     *
     * @param CreateServiceTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceTranslationAPIRequest $request)
    {
        $input = $request->all();

        $serviceTranslations = $this->serviceTranslationRepository->create($input);

        return $this->sendResponse($serviceTranslations->toArray(), 'Service Translation saved successfully');
    }

    /**
     * Display the specified ServiceTranslation.
     * GET|HEAD /serviceTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ServiceTranslation $serviceTranslation */
        $serviceTranslation = $this->serviceTranslationRepository->findWithoutFail($id);

        if (empty($serviceTranslation)) {
            return $this->sendError('Service Translation not found');
        }

        return $this->sendResponse($serviceTranslation->toArray(), 'Service Translation retrieved successfully');
    }

    /**
     * Update the specified ServiceTranslation in storage.
     * PUT/PATCH /serviceTranslations/{id}
     *
     * @param  int $id
     * @param UpdateServiceTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ServiceTranslation $serviceTranslation */
        $serviceTranslation = $this->serviceTranslationRepository->findWithoutFail($id);

        if (empty($serviceTranslation)) {
            return $this->sendError('Service Translation not found');
        }

        $serviceTranslation = $this->serviceTranslationRepository->update($input, $id);

        return $this->sendResponse($serviceTranslation->toArray(), 'ServiceTranslation updated successfully');
    }

    /**
     * Remove the specified ServiceTranslation from storage.
     * DELETE /serviceTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ServiceTranslation $serviceTranslation */
        $serviceTranslation = $this->serviceTranslationRepository->findWithoutFail($id);

        if (empty($serviceTranslation)) {
            return $this->sendError('Service Translation not found');
        }

        $serviceTranslation->delete();

        return $this->sendResponse($id, 'Service Translation deleted successfully');
    }
}
