<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateProductSubcategoryTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateProductSubcategoryTranslationAPIRequest;
use App\Models\Admin\ProductSubcategoryTranslation;
use App\Repositories\Admin\ProductSubcategoryTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductSubcategoryTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class ProductSubcategoryTranslationAPIController extends AppBaseController
{
    /** @var  ProductSubcategoryTranslationRepository */
    private $productSubcategoryTranslationRepository;

    public function __construct(ProductSubcategoryTranslationRepository $productSubcategoryTranslationRepo)
    {
        $this->productSubcategoryTranslationRepository = $productSubcategoryTranslationRepo;
    }

    /**
     * Display a listing of the ProductSubcategoryTranslation.
     * GET|HEAD /productSubcategoryTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productSubcategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->productSubcategoryTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $productSubcategoryTranslations = $this->productSubcategoryTranslationRepository->all();

        return $this->sendResponse($productSubcategoryTranslations->toArray(), 'Product Subcategory Translations retrieved successfully');
    }

    /**
     * Store a newly created ProductSubcategoryTranslation in storage.
     * POST /productSubcategoryTranslations
     *
     * @param CreateProductSubcategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductSubcategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        $productSubcategoryTranslations = $this->productSubcategoryTranslationRepository->create($input);

        return $this->sendResponse($productSubcategoryTranslations->toArray(), 'Product Subcategory Translation saved successfully');
    }

    /**
     * Display the specified ProductSubcategoryTranslation.
     * GET|HEAD /productSubcategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductSubcategoryTranslation $productSubcategoryTranslation */
        $productSubcategoryTranslation = $this->productSubcategoryTranslationRepository->findWithoutFail($id);

        if (empty($productSubcategoryTranslation)) {
            return $this->sendError('Product Subcategory Translation not found');
        }

        return $this->sendResponse($productSubcategoryTranslation->toArray(), 'Product Subcategory Translation retrieved successfully');
    }

    /**
     * Update the specified ProductSubcategoryTranslation in storage.
     * PUT/PATCH /productSubcategoryTranslations/{id}
     *
     * @param  int $id
     * @param UpdateProductSubcategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductSubcategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductSubcategoryTranslation $productSubcategoryTranslation */
        $productSubcategoryTranslation = $this->productSubcategoryTranslationRepository->findWithoutFail($id);

        if (empty($productSubcategoryTranslation)) {
            return $this->sendError('Product Subcategory Translation not found');
        }

        $productSubcategoryTranslation = $this->productSubcategoryTranslationRepository->update($input, $id);

        return $this->sendResponse($productSubcategoryTranslation->toArray(), 'ProductSubcategoryTranslation updated successfully');
    }

    /**
     * Remove the specified ProductSubcategoryTranslation from storage.
     * DELETE /productSubcategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductSubcategoryTranslation $productSubcategoryTranslation */
        $productSubcategoryTranslation = $this->productSubcategoryTranslationRepository->findWithoutFail($id);

        if (empty($productSubcategoryTranslation)) {
            return $this->sendError('Product Subcategory Translation not found');
        }

        $productSubcategoryTranslation->delete();

        return $this->sendResponse($id, 'Product Subcategory Translation deleted successfully');
    }
}
