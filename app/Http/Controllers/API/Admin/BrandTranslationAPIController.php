<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateBrandTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateBrandTranslationAPIRequest;
use App\Models\Admin\BrandTranslation;
use App\Repositories\Admin\BrandTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BrandTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class BrandTranslationAPIController extends AppBaseController
{
    /** @var  BrandTranslationRepository */
    private $brandTranslationRepository;

    public function __construct(BrandTranslationRepository $brandTranslationRepo)
    {
        $this->brandTranslationRepository = $brandTranslationRepo;
    }

    /**
     * Display a listing of the BrandTranslation.
     * GET|HEAD /brandTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->brandTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->brandTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $brandTranslations = $this->brandTranslationRepository->all();

        return $this->sendResponse($brandTranslations->toArray(), 'Brand Translations retrieved successfully');
    }

    /**
     * Store a newly created BrandTranslation in storage.
     * POST /brandTranslations
     *
     * @param CreateBrandTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBrandTranslationAPIRequest $request)
    {
        $input = $request->all();

        $brandTranslations = $this->brandTranslationRepository->create($input);

        return $this->sendResponse($brandTranslations->toArray(), 'Brand Translation saved successfully');
    }

    /**
     * Display the specified BrandTranslation.
     * GET|HEAD /brandTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BrandTranslation $brandTranslation */
        $brandTranslation = $this->brandTranslationRepository->findWithoutFail($id);

        if (empty($brandTranslation)) {
            return $this->sendError('Brand Translation not found');
        }

        return $this->sendResponse($brandTranslation->toArray(), 'Brand Translation retrieved successfully');
    }

    /**
     * Update the specified BrandTranslation in storage.
     * PUT/PATCH /brandTranslations/{id}
     *
     * @param  int $id
     * @param UpdateBrandTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBrandTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var BrandTranslation $brandTranslation */
        $brandTranslation = $this->brandTranslationRepository->findWithoutFail($id);

        if (empty($brandTranslation)) {
            return $this->sendError('Brand Translation not found');
        }

        $brandTranslation = $this->brandTranslationRepository->update($input, $id);

        return $this->sendResponse($brandTranslation->toArray(), 'BrandTranslation updated successfully');
    }

    /**
     * Remove the specified BrandTranslation from storage.
     * DELETE /brandTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BrandTranslation $brandTranslation */
        $brandTranslation = $this->brandTranslationRepository->findWithoutFail($id);

        if (empty($brandTranslation)) {
            return $this->sendError('Brand Translation not found');
        }

        $brandTranslation->delete();

        return $this->sendResponse($id, 'Brand Translation deleted successfully');
    }
}
