<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateProductPresentationTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateProductPresentationTranslationAPIRequest;
use App\Models\Admin\ProductPresentationTranslation;
use App\Repositories\Admin\ProductPresentationTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductPresentationTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class ProductPresentationTranslationAPIController extends AppBaseController
{
    /** @var  ProductPresentationTranslationRepository */
    private $productPresentationTranslationRepository;

    public function __construct(ProductPresentationTranslationRepository $productPresentationTranslationRepo)
    {
        $this->productPresentationTranslationRepository = $productPresentationTranslationRepo;
    }

    /**
     * Display a listing of the ProductPresentationTranslation.
     * GET|HEAD /productPresentationTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productPresentationTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->productPresentationTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $productPresentationTranslations = $this->productPresentationTranslationRepository->all();

        return $this->sendResponse($productPresentationTranslations->toArray(), 'Product Presentation Translations retrieved successfully');
    }

    /**
     * Store a newly created ProductPresentationTranslation in storage.
     * POST /productPresentationTranslations
     *
     * @param CreateProductPresentationTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductPresentationTranslationAPIRequest $request)
    {
        $input = $request->all();

        $productPresentationTranslations = $this->productPresentationTranslationRepository->create($input);

        return $this->sendResponse($productPresentationTranslations->toArray(), 'Product Presentation Translation saved successfully');
    }

    /**
     * Display the specified ProductPresentationTranslation.
     * GET|HEAD /productPresentationTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductPresentationTranslation $productPresentationTranslation */
        $productPresentationTranslation = $this->productPresentationTranslationRepository->findWithoutFail($id);

        if (empty($productPresentationTranslation)) {
            return $this->sendError('Product Presentation Translation not found');
        }

        return $this->sendResponse($productPresentationTranslation->toArray(), 'Product Presentation Translation retrieved successfully');
    }

    /**
     * Update the specified ProductPresentationTranslation in storage.
     * PUT/PATCH /productPresentationTranslations/{id}
     *
     * @param  int $id
     * @param UpdateProductPresentationTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductPresentationTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductPresentationTranslation $productPresentationTranslation */
        $productPresentationTranslation = $this->productPresentationTranslationRepository->findWithoutFail($id);

        if (empty($productPresentationTranslation)) {
            return $this->sendError('Product Presentation Translation not found');
        }

        $productPresentationTranslation = $this->productPresentationTranslationRepository->update($input, $id);

        return $this->sendResponse($productPresentationTranslation->toArray(), 'ProductPresentationTranslation updated successfully');
    }

    /**
     * Remove the specified ProductPresentationTranslation from storage.
     * DELETE /productPresentationTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductPresentationTranslation $productPresentationTranslation */
        $productPresentationTranslation = $this->productPresentationTranslationRepository->findWithoutFail($id);

        if (empty($productPresentationTranslation)) {
            return $this->sendError('Product Presentation Translation not found');
        }

        $productPresentationTranslation->delete();

        return $this->sendResponse($id, 'Product Presentation Translation deleted successfully');
    }
}
