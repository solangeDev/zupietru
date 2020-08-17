<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Admin\CreateProductCategoryTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateProductCategoryTranslationAPIRequest;
use App\Models\Admin\ProductCategory;
use App\Models\Admin\ProductCategoryTranslation;
use App\Repositories\Admin\ProductCategoryTranslationRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductCategoryTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class ProductCategoryTranslationAPIController extends AppBaseController
{
    /** @var  ProductCategoryTranslationRepository */
    private $productCategoryTranslationRepository;

    public function __construct(ProductCategoryTranslationRepository $productCategoryTranslationRepo)
    {
        $this->productCategoryTranslationRepository = $productCategoryTranslationRepo;
    }

    /**
     * Display a listing of the ProductCategoryTranslation.
     * GET|HEAD /productCategoryTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $this->productCategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        // $this->productCategoryTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        // $productCategoryTranslations = $this->productCategoryTranslationRepository->all();
        // $productCategoryTranslations = $this->getFinalProductsCategotyWithPresentations($productCategoryTranslations);
        //dd($productCategoryTranslations);
        // dd($finalProducts);
        // $productCategoryTranslations = $this->productCategoryTranslationRepository->all();
        $productCategories = ProductCategory::all();
        $Categories= $this->getFinalProductsCategotyWithPresentations($productCategories);
        $return = ['Categories' => $Categories];

        return $this->sendResponse($return, 'Products retrieved successfully');


    }

    /**
     * Get the final products with their presentations.
     *
     * @param collection $products
     * @return array $finalProducts
     */
    private function getFinalProductsCategotyWithPresentations($productCategories)
    {
        $finalProductsCategory = [];
        foreach ($productCategories as $key => $productCategory) {
            $finalProductsCategory[$key]                    = (object)[];
            $finalProductsCategory[$key]->id                = $productCategory->id;
            $finalProductsCategory[$key]->name              = $productCategory->itemByLanguage(\App::getLocale())->name;
            // pendiente: si un producto no tiene presentaciones, se debe mostrar?
            //$finalProducts[$key]->sizes = $this->getProductPresentationProduct( $product->id );
        }
        return $finalProductsCategory;
    }

    /**
     * Store a newly created ProductCategoryTranslation in storage.
     * POST /productCategoryTranslations
     *
     * @param CreateProductCategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductCategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        $productCategoryTranslations = $this->productCategoryTranslationRepository->create($input);

        return $this->sendResponse($productCategoryTranslations->toArray(), 'Product Category Translation saved successfully');
    }

    /**
     * Display the specified ProductCategoryTranslation.
     * GET|HEAD /productCategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductCategoryTranslation $productCategoryTranslation */
        $productCategoryTranslation = $this->productCategoryTranslationRepository->findWithoutFail($id);

        if (empty($productCategoryTranslation)) {
            return $this->sendError('Product Category Translation not found');
        }

        return $this->sendResponse($productCategoryTranslation->toArray(), 'Product Category Translation retrieved successfully');
    }

    /**
     * Update the specified ProductCategoryTranslation in storage.
     * PUT/PATCH /productCategoryTranslations/{id}
     *
     * @param  int $id
     * @param UpdateProductCategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductCategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductCategoryTranslation $productCategoryTranslation */
        $productCategoryTranslation = $this->productCategoryTranslationRepository->findWithoutFail($id);

        if (empty($productCategoryTranslation)) {
            return $this->sendError('Product Category Translation not found');
        }

        $productCategoryTranslation = $this->productCategoryTranslationRepository->update($input, $id);

        return $this->sendResponse($productCategoryTranslation->toArray(), 'ProductCategoryTranslation updated successfully');
    }

    /**
     * Remove the specified ProductCategoryTranslation from storage.
     * DELETE /productCategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductCategoryTranslation $productCategoryTranslation */
        $productCategoryTranslation = $this->productCategoryTranslationRepository->findWithoutFail($id);

        if (empty($productCategoryTranslation)) {
            return $this->sendError('Product Category Translation not found');
        }

        $productCategoryTranslation->delete();

        return $this->sendResponse($id, 'Product Category Translation deleted successfully');
    }
}
