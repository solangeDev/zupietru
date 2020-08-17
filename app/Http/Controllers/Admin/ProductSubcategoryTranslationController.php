<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateProductSubcategoryTranslationRequest;
use App\Http\Requests\Admin\UpdateProductSubcategoryTranslationRequest;
use App\Models\Admin\ProductCategory;
use App\Models\Admin\ProductSubcategory;
use App\Models\Admin\ProductSubcategoryTranslation;
use App\Repositories\Admin\ProductSubcategoryRepository;
use App\Repositories\Admin\ProductSubcategoryTranslationRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductSubcategoryTranslationController extends AppBaseController
{
    /** @var  ProductSubcategoryTranslationRepository */
    private $productSubcategoryTranslationRepository;

    /** @var  ProductSubcategoryRepository */
    private $productSubcategoryRepository;

    public function __construct(
        ProductSubcategoryTranslationRepository $productSubcategoryTranslationRepo,
        ProductSubcategoryRepository $productSubcategoryRepo)
    {
        $this->productSubcategoryTranslationRepository = $productSubcategoryTranslationRepo;
        $this->productSubcategoryRepository = $productSubcategoryRepo;
    }

    /**
     * Display a listing of the ProductSubcategoryTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productSubcategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $productSubcategoryTranslations = $this->productSubcategoryTranslationRepository->all();

        return view('admin.products.product_subcategory_translations.index')
            ->with('productSubcategoryTranslations', $productSubcategoryTranslations);
    }

    /**
     * Show the form for creating a new ProductSubcategoryTranslation.
     *
     * @return Response
     */
    public function create()
    {
        $product_categories = ProductCategory::byLanguage(\App::getLocale())->get()->pluck('name', 'id');

        return view('admin.products.product_subcategory_translations.create', compact('product_categories'));
    }

    /**
     * Store a newly created ProductSubcategoryTranslation in storage.
     *
     * @param CreateProductSubcategoryTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateProductSubcategoryTranslationRequest $request)
    {
        // save Product
        $productSubcategory = $this->saveProductSubcategory($request);

        // save ProductTranslation
        $productSubcategoryTranslation = $this->saveProductSubcategoryTranslation($request, $productSubcategory);


        Flash::success('Product Subcategory saved successfully.');

        return redirect(route('admin.productSubcategories.index'));
    }

    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $productSubcategory
     *
     * @return ProductSubcategory $productSubcategory
     */
    public function saveProductSubcategory($request, $productSubcategory = null)
    {
        //data model
        $inputProductSubcategory = $request->only(['product_category_id', 'status_id']);
        $inputProductSubcategory['slug'] = str_slug($request->input('name'), '-');

        // if creating a newly model
        if ($productSubcategory == null) {
            $productSubcategory = $this->productSubcategoryRepository->create($inputProductSubcategory);
        }
        // if updating a existing model
        else {
            $productSubcategory->update($inputProductSubcategory);
        }

        return $productSubcategory;
    }

    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $productSubcategory
     * @param $productSubcategoryTranslation
     *
     * @return ProductSubcategoryTranslation $productSubcategoryTranslation
     */
    public function saveProductSubcategoryTranslation($request, $productSubcategory, $productSubcategoryTranslation = null)
    {

        //data productSubcategoryTranslation
        $inputProductSubcategoryTranslation = $request->only(['language_id', 'name', 'description']);
        $inputProductSubcategoryTranslation['product_subcategory_id'] = $productSubcategory->id;

        // if creating a newly model
        if ($productSubcategoryTranslation == null) {
            $productSubcategoryTranslation = $this->productSubcategoryTranslationRepository->create($inputProductSubcategoryTranslation);
        }
        // if updating a existing model
        else {
            $productSubcategoryTranslation->update($inputProductSubcategoryTranslation);
            // $productSubcategoryTranslation = $this->productSubcategoryTranslationRepository->update($request->all(), $id);
        }

        return $productSubcategoryTranslation;
    }

    /**
     * Display the specified ProductSubcategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productSubcategoryTranslation = $this->productSubcategoryTranslationRepository->findWithoutFail($id);

        if (empty($productSubcategoryTranslation)) {
            Flash::error('Product Subcategory not found');

            return redirect(route('admin.productSubcategories.index'));
        }

        return view('admin.products.product_subcategory_translations.show')->with('productSubcategoryTranslation', $productSubcategoryTranslation);
    }

    /**
     * Show the form for editing the specified ProductSubcategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product_categories = ProductCategory::byLanguage(\App::getLocale())->get()->pluck('name', 'id');

        $productSubcategoryTranslation = $this->productSubcategoryTranslationRepository->findWithoutFail($id);

        if (empty($productSubcategoryTranslation)) {
            Flash::error('Product Subcategory not found');

            return redirect(route('admin.productSubcategories.index'));
        }

        return view('admin.products.product_subcategory_translations.edit', compact('product_categories'))->with('productSubcategoryTranslation', $productSubcategoryTranslation);
    }

    /**
     * Update the specified ProductSubcategoryTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateProductSubcategoryTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductSubcategoryTranslationRequest $request)
    {
        $productSubcategoryTranslation = $this->productSubcategoryTranslationRepository->findWithoutFail($id);

        if (empty($productSubcategoryTranslation)) {
            Flash::error('Product Subcategory not found');

            return redirect(route('admin.productSubcategories.index'));
        }


        // get ProductSubcategory
        $productSubcategory = ProductSubcategory::find( $productSubcategoryTranslation->product_subcategory_id );

        // save ProductSubcategory
        $productSubcategory = $this->saveProductSubcategory($request, $productSubcategory);

        // save ProductSubcategoryTranslation
        $productSubcategoryTranslation = $this->saveProductSubcategoryTranslation($request, $productSubcategory, $productSubcategoryTranslation);



        Flash::success('Product Subcategory updated successfully.');

        return redirect(route('admin.productSubcategories.index'));
    }

    /**
     * Remove the specified ProductSubcategoryTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productSubcategoryTranslation = $this->productSubcategoryTranslationRepository->findWithoutFail($id);

        if (empty($productSubcategoryTranslation)) {
            Flash::error('Product Subcategory not found');

            return redirect(route('admin.productSubcategories.index'));
        }

        $this->productSubcategoryTranslationRepository->delete($id);

        Flash::success('Product Subcategory deleted successfully.');

        return redirect(route('admin.productSubcategories.index'));
    }
}
