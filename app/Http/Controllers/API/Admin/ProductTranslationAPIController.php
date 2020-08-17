<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Admin\CreateProductTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateProductTranslationAPIRequest;
use App\Models\Admin\Product;
use App\Models\Admin\ProductPresentationProduct;
use App\Models\Admin\ProductTranslation;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Admin\ProductTranslationRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class ProductTranslationAPIController extends AppBaseController
{
    /** @var  ProductTranslationRepository */
    private $productTranslationRepository;

    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductTranslationRepository $productTranslationRepo,
        ProductRepository $productRepo)
    {
        $this->productTranslationRepository = $productTranslationRepo;
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the ProductTranslation.
     * GET|HEAD /productTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $this->productTranslationRepository->pushCriteria(new RequestCriteria($request));
        // $this->productTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        // $productTranslations = $this->productTranslationRepository->all();
        // return $this->sendResponse($productTranslations->toArray(), 'Products retrieved successfully');


        $products = Product::all(); // subcagorias 1:masa, 2:adicionales, 3:resto
        $finalProducts = $this->getFinalProductsWithPresentations($products);
        // dd($finalProducts);

        $return = ['products' => $finalProducts];

        return $this->sendResponse($return, 'Products retrieved successfully');
    }

    /**
     * Get the final products with their presentations.
     *
     * @param collection $products
     * @return array $finalProducts
     */
    private function getFinalProductsWithPresentations($products)
    {
        // dd($products);
        $finalProducts = [];
        foreach ($products as $key => $product) {
            $finalProducts[$key]                    = (object)[];
            $finalProducts[$key]->id                = $product->id;
            $finalProducts[$key]->title             = $product->itemByLanguage(\App::getLocale())->name;
            $finalProducts[$key]->description       = $product->itemByLanguage(\App::getLocale())->description;
            $finalProducts[$key]->price             = $product->price;
            $finalProducts[$key]->id_category       = $product->subcategory_id;
            $finalProducts[$key]->id_presentation   = $product->for_delivery;
            $finalProducts[$key]->image             = $this->getMultimedia( $product->galeryImagesAPI() );

            // pendiente: si un producto no tiene presentaciones, se debe mostrar?
            //$finalProducts[$key]->sizes = $this->getProductPresentationProduct( $product->id );
        }
        return $finalProducts;
    }

    public function getMultimedia($rowMultimedias)
    {
        $imageNames = [];
        $imageCount = 0;

        // dd( is_object($rowMultimedias) );

        foreach((array)$rowMultimedias as $rowMultimedia) {
            $imageNames[$imageCount]       = (object)[];
            $imageNames[$imageCount]->id   = $rowMultimedia->multimedia->id;
            $imageNames[$imageCount]->name = $rowMultimedia->multimedia->name;
            $imageCount++;
        }

        return $imageNames;
    }

    /**
     * Get the Many to many items in table product_presentations_products for the given product.
     *
     * @param int $product_id
     * @return array $array
     */
    private function getProductPresentationProduct($product_id)
    {
        $product_presentations_products = ProductPresentationProduct::where('product_id', $product_id)->get();
        $array = [];
        foreach ($product_presentations_products as $keyJ => $product_presentation_product) {
            $array[$keyJ]        = (object)[];
            $array[$keyJ]->id    = $product_presentation_product->id;
            $array[$keyJ]->title = $product_presentation_product->productPresentation->itemByLanguage(\App::getLocale())->name;
            $array[$keyJ]->price = $product_presentation_product->price;
        }

        return $array;
    }


    /**
     * Store a newly created ProductTranslation in storage.
     * POST /productTranslations
     *
     * @param CreateProductTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductTranslationAPIRequest $request)
    {
        $input = $request->all();

        $productTranslations = $this->productTranslationRepository->create($input);

        return $this->sendResponse($productTranslations->toArray(), 'Product saved successfully');
    }

    /**
     * Display the specified ProductTranslation.
     * GET|HEAD /productTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductTranslation $productTranslation */
        $productTranslation = $this->productTranslationRepository->findWithoutFail($id);

        if (empty($productTranslation)) {
            return $this->sendError('Product not found');
        }

        return $this->sendResponse($productTranslation->toArray(), 'Product retrieved successfully');
    }

    /**
     * Update the specified ProductTranslation in storage.
     * PUT/PATCH /productTranslations/{id}
     *
     * @param  int $id
     * @param UpdateProductTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductTranslation $productTranslation */
        $productTranslation = $this->productTranslationRepository->findWithoutFail($id);

        if (empty($productTranslation)) {
            return $this->sendError('Product not found');
        }

        $productTranslation = $this->productTranslationRepository->update($input, $id);

        return $this->sendResponse($productTranslation->toArray(), 'ProductTranslation updated successfully');
    }

    /**
     * Remove the specified ProductTranslation from storage.
     * DELETE /productTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductTranslation $productTranslation */
        $productTranslation = $this->productTranslationRepository->findWithoutFail($id);

        if (empty($productTranslation)) {
            return $this->sendError('Product not found');
        }

        $productTranslation->delete();

        return $this->sendResponse($id, 'Product deleted successfully');
    }
}
