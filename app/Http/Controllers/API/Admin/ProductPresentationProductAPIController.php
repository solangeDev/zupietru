<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateProductPresentationProductAPIRequest;
use App\Http\Requests\API\Admin\UpdateProductPresentationProductAPIRequest;
use App\Models\Admin\ProductPresentationProduct;
use App\Repositories\Admin\ProductPresentationProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductPresentationProductController
 * @package App\Http\Controllers\API\Admin
 */

class ProductPresentationProductAPIController extends AppBaseController
{
    /** @var  ProductPresentationProductRepository */
    private $productPresentationProductRepository;

    public function __construct(ProductPresentationProductRepository $productPresentationProductRepo)
    {
        $this->productPresentationProductRepository = $productPresentationProductRepo;
    }

    /**
     * Display a listing of the ProductPresentationProduct.
     * GET|HEAD /productPresentationProducts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productPresentationProductRepository->pushCriteria(new RequestCriteria($request));
        $this->productPresentationProductRepository->pushCriteria(new LimitOffsetCriteria($request));
        $productPresentationProducts = $this->productPresentationProductRepository->all();

        return $this->sendResponse($productPresentationProducts->toArray(), 'Product Presentation Products retrieved successfully');
    }

    /**
     * Store a newly created ProductPresentationProduct in storage.
     * POST /productPresentationProducts
     *
     * @param CreateProductPresentationProductAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductPresentationProductAPIRequest $request)
    {
        $input = $request->all();

        $productPresentationProducts = $this->productPresentationProductRepository->create($input);

        return $this->sendResponse($productPresentationProducts->toArray(), 'Product Presentation Product saved successfully');
    }

    /**
     * Display the specified ProductPresentationProduct.
     * GET|HEAD /productPresentationProducts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductPresentationProduct $productPresentationProduct */
        $productPresentationProduct = $this->productPresentationProductRepository->findWithoutFail($id);

        if (empty($productPresentationProduct)) {
            return $this->sendError('Product Presentation Product not found');
        }

        return $this->sendResponse($productPresentationProduct->toArray(), 'Product Presentation Product retrieved successfully');
    }

    /**
     * Update the specified ProductPresentationProduct in storage.
     * PUT/PATCH /productPresentationProducts/{id}
     *
     * @param  int $id
     * @param UpdateProductPresentationProductAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductPresentationProductAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductPresentationProduct $productPresentationProduct */
        $productPresentationProduct = $this->productPresentationProductRepository->findWithoutFail($id);

        if (empty($productPresentationProduct)) {
            return $this->sendError('Product Presentation Product not found');
        }

        $productPresentationProduct = $this->productPresentationProductRepository->update($input, $id);

        return $this->sendResponse($productPresentationProduct->toArray(), 'ProductPresentationProduct updated successfully');
    }

    /**
     * Remove the specified ProductPresentationProduct from storage.
     * DELETE /productPresentationProducts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductPresentationProduct $productPresentationProduct */
        $productPresentationProduct = $this->productPresentationProductRepository->findWithoutFail($id);

        if (empty($productPresentationProduct)) {
            return $this->sendError('Product Presentation Product not found');
        }

        $productPresentationProduct->delete();

        return $this->sendResponse($id, 'Product Presentation Product deleted successfully');
    }
}
