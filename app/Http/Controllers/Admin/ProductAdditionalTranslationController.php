<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateProductAdditionalTranslationRequest;
use App\Http\Requests\Admin\CreateProductTranslationRequest;
use App\Http\Requests\Admin\UpdateProductAdditionalTranslationRequest;
use App\Http\Requests\Admin\UpdateProductTranslationRequest;
use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;
use App\Models\Admin\ProductPresentation;
use App\Models\Admin\ProductPresentationProduct;
use App\Models\Admin\ProductPresentationTranslation;
use App\Models\Admin\ProductSubcategory;
use App\Models\Admin\ProductTranslation;
use App\Repositories\Admin\ProductPresentationRepository;
use App\Repositories\Admin\ProductPresentationTranslationRepository;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Admin\ProductTranslationRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductAdditionalTranslationController extends AppBaseController
{
    /** @var  ProductTranslationRepository */
    private $productTranslationRepository;

    /** @var  ProductRepository */
    private $productRepository;

    /** @var  ProductPresentationRepository */
    private $productPresentationRepository;

    /** @var  ProductPresentationTranslationRepository */
    private $productPresentationTranslationRepository;

    public function __construct(
        ProductTranslationRepository $productTranslationRepo,
        ProductRepository $productRepo,
        ProductPresentationRepository $productPresentationRepo,
        ProductPresentationTranslationRepository $productPresentationTranslationRepositoryRepo)
    {
        $this->productTranslationRepository             = $productTranslationRepo;
        $this->productRepository                        = $productRepo;
        $this->productPresentationRepository            = $productPresentationRepo;
        $this->productPresentationTranslationRepository = $productPresentationTranslationRepositoryRepo;
    }

    /**
     * Display a listing of the ProductTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $productAdditionals = Product::where('subcategory_id', 2)->get()->toArray();
        $productTranslationAdditionals = ProductTranslation::whereIn('product_id', array_column($productAdditionals, 'id'))->get();
        // dd($productTranslationAdditionals);exit();

        return view('admin.products.product_additional_translations.index')
            ->with('productTranslationAdditionals', $productTranslationAdditionals);
    }

    /**
     * Show the form for creating a new ProductTranslation.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        return view('admin.products.product_additional_translations.create');
    }

    /**
     * Store a newly created ProductTranslation in storage.
     *
     * @param CreateProductTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateProductAdditionalTranslationRequest $request)
    {
        // save Product
        $product = $this->saveProduct($request);

        // save ProductTranslation
        $productTranslation = $this->saveProductTranslation($request, $product);

        //save productPresentationProduct
        $productPresentationProduct = $this->saveProductPresentationProduct($request, $product);

        //create product_presentation_translation

        Flash::success('Product saved successfully.');

        return redirect(route('admin.productAdditionals.index'));
    }

    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $product
     *
     * @return Product $product
     */
    public function saveProduct($request, $product = null)
    {
        //data model
        $inputProduct = $request->only(['status_id', 'brand_id', 'subcategory_id']);
        $inputProduct['slug'] = str_slug($request->input('name'), '-');

        // if creating a newly model
        if ($product == null) {
            $product = $this->productRepository->create($inputProduct);
        }
        // if updating a existing model
        else {
            $product->update($inputProduct);
        }

        return $product;
    }

    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $productTranslation
     *
     * @return ProductTranslation $productTranslation
     */
    public function saveProductTranslation($request, $product, $productTranslation = null)
    {

        //data productTranslation
        $inputProductTranslation = $request->only(['language_id', 'name', 'description']);
        $inputProductTranslation['product_id'] = $product->id;

        // if creating a newly model
        if ($productTranslation == null) {
            $productTranslation = $this->productTranslationRepository->create($inputProductTranslation);
        }
        // if updating a existing model
        else {
            $productTranslation->update($inputProductTranslation);
            // $productTranslation = $this->productTranslationRepository->update($request->all(), $id);
        }

        return $productTranslation;
    }

    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $product
     * @param $productPresentationProduct
     *
     * @return ProductTranslation $productPresentationProduct
     */
    public function saveProductPresentationProduct($request, $product, $productPresentationProduct = null)
    {
        //data productPresentationProduct
        $inputProductPresentationProduct = $request->only(['price', 'product_presentation_id']);
        $inputProductPresentationProduct['product_id'] = $product->id;

        // dd($inputProductPresentationProduct);exit();

        // if creating a newly model
        if ($productPresentationProduct == null) {
            $productPresentationProduct = ProductPresentationProduct::create($inputProductPresentationProduct);
        }
        // if updating a existing model
        else {
            $productPresentationProduct->update($inputProductPresentationProduct);
            // $productPresentationProduct = $this->productTranslationRepository->update($request->all(), $id);
        }

        return $productPresentationProduct;
    }

    /**
     * Display the specified ProductTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productTranslation = $this->productTranslationRepository->findWithoutFail($id);

        if (empty($productTranslation)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        return view('admin.products.product_additional_translations.show')->with('productTranslation', $productTranslation);
    }

    /**
     * Show the form for editing the specified ProductTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $productTranslation = $this->productTranslationRepository->findWithoutFail($id);

        if (empty($productTranslation)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        return view('admin.products.product_additional_translations.edit')->with('productTranslation', $productTranslation);
    }

    /**
     * Update the specified ProductTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateProductTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductAdditionalTranslationRequest $request)
    {

        // dd($request);
        $productTranslation = $this->productTranslationRepository->findWithoutFail($id);


        if (empty($productTranslation)) {
            Flash::error('Product not found');

            return redirect(route('admin.productAdditionals.index'));
        }


        // get Product
        $product = Product::find( $productTranslation->product_id );

        // save Product
        $product = $this->saveProduct($request, $product);

        // save ProductTranslation
        $productTranslation = $this->saveProductTranslation($request, $product, $productTranslation);

        // get productPresentationProduct
        $productPresentationProduct = $product->productPresentationsProducts->first();

        //save productPresentationProduct
        $productPresentationProduct = $this->saveProductPresentationProduct($request, $product, $productPresentationProduct);


        Flash::success('Product updated successfully.');

        return redirect(route('admin.productAdditionals.index'));
    }

    /**
     * Remove the specified ProductTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productTranslation = $this->productTranslationRepository->findWithoutFail($id);

        if (empty($productTranslation)) {
            Flash::error('Product not found');

            return redirect(route('admin.productAdditionals.index'));
        }

        $this->productTranslationRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('admin.productAdditionals.index'));
    }
}
