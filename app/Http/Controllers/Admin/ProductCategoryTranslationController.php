<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateProductCategoryTranslationRequest;
use App\Http\Requests\Admin\UpdateProductCategoryTranslationRequest;
use App\Models\Admin\ProductCategory;
use App\Models\Admin\ProductSubcategoryTranslation;
use App\Repositories\Admin\ProductCategoryRepository;
use App\Repositories\Admin\ProductCategoryTranslationRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductCategoryTranslationController extends AppBaseController
{
    /** @var  ProductCategoryTranslationRepository */
    private $productCategoryTranslationRepository;

    /** @var  ProductCategoryRepository */
    private $productCategoryRepository;

    public function __construct(
        ProductCategoryTranslationRepository $productCategoryTranslationRepo,
        ProductCategoryRepository $productCategoryRepo)
    {
        $this->productCategoryTranslationRepository = $productCategoryTranslationRepo;
        $this->productCategoryRepository = $productCategoryRepo;
    }

    /**
     * Display a listing of the ProductCategoryTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productCategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $productCategoryTranslations = $this->productCategoryTranslationRepository->all();

        return view('admin.products.product_category_translations.index')
            ->with('productCategoryTranslations', $productCategoryTranslations);
    }

    /**
     * Show the form for creating a new ProductCategoryTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.products.product_category_translations.create');
    }

    /**
     * Store a newly created ProductCategoryTranslation in storage.
     *
     * @param CreateProductCategoryTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateProductCategoryTranslationRequest $request)
    {


        // save Product
        $productCategory = $this->saveProductCategory($request);

        // save ProductTranslation
        $productCategoryTranslation = $this->saveProductCategoryTranslation($request, $productCategory);


        Flash::success('Product Category saved successfully.');

        return redirect(route('admin.productCategories.index'));
    }

    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $productCategory
     *
     * @return ProductCategory $productCategory
     */
    public function saveProductCategory($request, $productCategory = null)
    {
        //data model
        $inputProductCategory = $request->only(['status_id']);
        $inputProductCategory['slug'] = str_slug($request->input('name'), '-');

        // if creating a newly model
        if ($productCategory == null) {
            $productCategory = $this->productCategoryRepository->create($inputProductCategory);
        }
        // if updating a existing model
        else {
            $productCategory->update($inputProductCategory);
        }

        return $productCategory;
    }

    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $productCategoryTranslation
     *
     * @return ProductCategoryTranslation $productCategoryTranslation
     */
    public function saveProductCategoryTranslation($request, $productCategory, $productCategoryTranslation = null)
    {

        //data productCategoryTranslation
        $inputProductCategoryTranslation = $request->only(['language_id', 'name', 'description']);
        $inputProductCategoryTranslation['product_category_id'] = $productCategory->id;

        // if creating a newly model
        if ($productCategoryTranslation == null) {
            $productCategoryTranslation = $this->productCategoryTranslationRepository->create($inputProductCategoryTranslation);
        }
        // if updating a existing model
        else {
            $productCategoryTranslation->update($inputProductCategoryTranslation);
            // $productCategoryTranslation = $this->productCategoryTranslationRepository->update($request->all(), $id);
        }

        return $productCategoryTranslation;
    }

    /**
     * Display the specified ProductCategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productCategoryTranslation = $this->productCategoryTranslationRepository->findWithoutFail($id);

        if (empty($productCategoryTranslation)) {
            Flash::error('Product Category not found');

            return redirect(route('admin.productCategories.index'));
        }

        return view('admin.products.product_category_translations.show')->with('productCategoryTranslation', $productCategoryTranslation);
    }

    /**
     * Show the form for editing the specified ProductCategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productCategoryTranslation = $this->productCategoryTranslationRepository->findWithoutFail($id);

        if (empty($productCategoryTranslation)) {
            Flash::error('Product Category not found');

            return redirect(route('admin.productCategories.index'));
        }

        return view('admin.products.product_category_translations.edit')->with('productCategoryTranslation', $productCategoryTranslation);
    }

    /**
     * Update the specified ProductCategoryTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateProductCategoryTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductCategoryTranslationRequest $request)
    {
        $productCategoryTranslation = $this->productCategoryTranslationRepository->findWithoutFail($id);

        if (empty($productCategoryTranslation)) {
            Flash::error('Product Category not found');

            return redirect(route('admin.productCategories.index'));
        }


        // get ProductCategory
        $productCategory = ProductCategory::find( $productCategoryTranslation->product_category_id );

        // save ProductCategory
        $productCategory = $this->saveProductCategory($request, $productCategory);

        // save ProductCategoryTranslation
        $productCategoryTranslation = $this->saveProductCategoryTranslation($request, $productCategory, $productCategoryTranslation);


        Flash::success('Product Category updated successfully.');

        return redirect(route('admin.productCategories.index'));
    }

    /**
     * Remove the specified ProductCategoryTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productCategoryTranslation = $this->productCategoryTranslationRepository->findWithoutFail($id);

        if (empty($productCategoryTranslation)) {
            Flash::error('Product Category not found');

            return redirect(route('admin.productCategories.index'));
        }

        $this->productCategoryTranslationRepository->delete($id);

        Flash::success('Product Category deleted successfully.');

        return redirect(route('admin.productCategories.index'));
    }
}
