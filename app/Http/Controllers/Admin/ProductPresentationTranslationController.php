<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateProductPresentationTranslationRequest;
use App\Http\Requests\Admin\UpdateProductPresentationTranslationRequest;
use App\Models\Admin\ProductPresentation;
use App\Repositories\Admin\ProductPresentationRepository;
use App\Repositories\Admin\ProductPresentationTranslationRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductPresentationTranslationController extends AppBaseController
{
    /** @var  ProductPresentationTranslationRepository */
    private $productPresentationTranslationRepository;

    /** @var  ProductPresentationRepository */
    private $productPresentationRepository;

    public function __construct(
        ProductPresentationTranslationRepository $productPresentationTranslationRepo,
        ProductPresentationRepository $productPresentationRepo)
    {
        $this->productPresentationTranslationRepository = $productPresentationTranslationRepo;
        $this->productPresentationRepository = $productPresentationRepo;
    }

    /**
     * Display a listing of the ProductPresentationTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productPresentationTranslationRepository->pushCriteria(new RequestCriteria($request));
        $productPresentationTranslations = $this->productPresentationTranslationRepository->all();

        return view('admin.products.product_presentation_translations.index')
            ->with('productPresentationTranslations', $productPresentationTranslations);
    }

    /**
     * Show the form for creating a new ProductPresentationTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.products.product_presentation_translations.create');
    }

    /**
     * Store a newly created ProductPresentationTranslation in storage.
     *
     * @param CreateProductPresentationTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateProductPresentationTranslationRequest $request)
    {


        // save ProductPresentation
        $productPresentation = $this->saveProductPresentation($request);

        // save ProductPresentationTranslation
        $productPresentationTranslation = $this->saveProductPresentationTranslation($request, $productPresentation);

        Flash::success('Product Presentation saved successfully.');

        return redirect(route('admin.productPresentations.index'));
    }

    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $productPresentation
     *
     * @return ProductPresentation $productPresentation
     */
    public function saveProductPresentation($request, $productPresentation = null)
    {
        //data model
        $inputProductPresentation = $request->only(['status_id']);

        // if creating a newly model
        if ($productPresentation == null) {
            $productPresentation = $this->productPresentationRepository->create($inputProductPresentation);
        }
        // if updating a existing model
        else {
            $productPresentation->update($inputProductPresentation);
        }

        return $productPresentation;
    }

    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $productPresentationTranslation
     *
     * @return ProductPresentationTranslation $productPresentationTranslation
     */
    public function saveProductPresentationTranslation($request, $productPresentation, $productPresentationTranslation = null)
    {

        //data productPresentationTranslation
        $inputProductPresentationTranslation = $request->only(['language_id', 'name', 'description']);
        $inputProductPresentationTranslation['product_presentation_id'] = $productPresentation->id;

        // if creating a newly model
        if ($productPresentationTranslation == null) {
            $productPresentationTranslation = $this->productPresentationTranslationRepository->create($inputProductPresentationTranslation);
        }
        // if updating a existing model
        else {
            $productPresentationTranslation->update($inputProductPresentationTranslation);
            // $productPresentationTranslation = $this->productPresentationTranslationRepository->update($request->all(), $id);
        }

        return $productPresentationTranslation;
    }

    /**
     * Display the specified ProductPresentationTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productPresentationTranslation = $this->productPresentationTranslationRepository->findWithoutFail($id);

        if (empty($productPresentationTranslation)) {
            Flash::error('Product Presentation not found');

            return redirect(route('admin.productPresentations.index'));
        }

        return view('admin.products.product_presentation_translations.show')->with('productPresentationTranslation', $productPresentationTranslation);
    }

    /**
     * Show the form for editing the specified ProductPresentationTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productPresentationTranslation = $this->productPresentationTranslationRepository->findWithoutFail($id);

        if (empty($productPresentationTranslation)) {
            Flash::error('Product Presentation not found');

            return redirect(route('admin.productPresentations.index'));
        }

        return view('admin.products.product_presentation_translations.edit')->with('productPresentationTranslation', $productPresentationTranslation);
    }

    /**
     * Update the specified ProductPresentationTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateProductPresentationTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductPresentationTranslationRequest $request)
    {
        $productPresentationTranslation = $this->productPresentationTranslationRepository->findWithoutFail($id);

        if (empty($productPresentationTranslation)) {
            Flash::error('Product Presentation not found');

            return redirect(route('admin.productPresentations.index'));
        }


        // get ProductPresentation
        $productPresentation = ProductPresentation::find( $productPresentationTranslation->product_presentation_id );

        // save ProductPresentation
        $productPresentation = $this->saveProductPresentation($request, $productPresentation);

        // save ProductPresentationTranslation
        $productPresentationTranslation = $this->saveProductPresentationTranslation($request, $productPresentation, $productPresentationTranslation);



        Flash::success('Product Presentation updated successfully.');

        return redirect(route('admin.productPresentations.index'));
    }

    /**
     * Remove the specified ProductPresentationTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productPresentationTranslation = $this->productPresentationTranslationRepository->findWithoutFail($id);

        if (empty($productPresentationTranslation)) {
            Flash::error('Product Presentation not found');

            return redirect(route('admin.productPresentations.index'));
        }

        $this->productPresentationTranslationRepository->delete($id);

        Flash::success('Product Presentation deleted successfully.');

        return redirect(route('admin.productPresentations.index'));
    }
}
