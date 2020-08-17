<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\LanguageController;
use App\Http\Requests\Admin\CreateBrandTranslationRequest;
use App\Http\Requests\Admin\UpdateBrandTranslationRequest;
use App\Models\Admin\Brand;
use App\Repositories\Admin\BrandRepository;
use App\Repositories\Admin\BrandTranslationRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BrandTranslationController extends AppBaseController
{
    /** @var  BrandTranslationRepository */
    private $brandTranslationRepository;

    /** @var  BrandRepository */
    private $brandRepository;

    public function __construct(
        BrandTranslationRepository $brandTranslationRepo,
        BrandRepository $brandRepo)
    {
        $this->brandTranslationRepository = $brandTranslationRepo;
        $this->brandRepository = $brandRepo;
    }

    /**
     * Display a listing of the BrandTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->brandTranslationRepository->pushCriteria(new RequestCriteria($request));
        $brandTranslations = $this->brandTranslationRepository->all();

        return view('admin.products.brand_translations.index')
            ->with('brandTranslations', $brandTranslations);
    }

    /**
     * Show the form for creating a new BrandTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.products.brand_translations.create', compact('tags'));
    }

    /**
     * Store a newly created BrandTranslation in storage.
     *
     * @param CreateBrandTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateBrandTranslationRequest $request)
    {


        // save Brand
        $brand = $this->saveBrand($request);

        // save BrandTranslation
        $brandTranslation = $this->saveBrandTranslation($request, $brand);


        Flash::success('Brand saved successfully.');

        return redirect(route('admin.brands.index'));
    }

    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $brand
     *
     * @return Brand $brand
     */
    public function saveBrand($request, $brand = null)
    {
        //data model
        $inputBrand = $request->only(['status_id']);
        $inputBrand['slug'] = str_slug($request->input('name'), '-');

        // if creating a newly model
        if ($brand == null) {
            $brand = $this->brandRepository->create($inputBrand);
        }
        // if updating a existing model
        else {
            $brand->update($inputBrand);
        }

        return $brand;
    }

    /**
     * Save (store/update) a model in storage.
     *
     * @param $request
     * @param $brandTranslation
     *
     * @return BrandTranslation $brandTranslation
     */
    public function saveBrandTranslation($request, $brand, $brandTranslation = null)
    {

        //data brandTranslation
        $inputBrandTranslation = $request->only(['language_id', 'name', 'description']);
        $inputBrandTranslation['brand_id'] = $brand->id;

        // if creating a newly model
        if ($brandTranslation == null) {
            $brandTranslation = $this->brandTranslationRepository->create($inputBrandTranslation);
        }
        // if updating a existing model
        else {
            $brandTranslation->update($inputBrandTranslation);
            // $brandTranslation = $this->brandTranslationRepository->update($request->all(), $id);
        }

        return $brandTranslation;
    }

    /**
     * Display the specified BrandTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $brandTranslation = $this->brandTranslationRepository->findWithoutFail($id);

        if (empty($brandTranslation)) {
            Flash::error('Brand not found');

            return redirect(route('admin.brands.index'));
        }

        return view('admin.products.brand_translations.show')->with('brandTranslation', $brandTranslation);
    }

    /**
     * Show the form for editing the specified BrandTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $brandTranslation = $this->brandTranslationRepository->findWithoutFail($id);

        if (empty($brandTranslation)) {
            Flash::error('Brand not found');

            return redirect(route('admin.brands.index'));
        }

        return view('admin.products.brand_translations.edit')->with('brandTranslation', $brandTranslation);
    }

    /**
     * Update the specified BrandTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateBrandTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBrandTranslationRequest $request)
    {
        $brandTranslation = $this->brandTranslationRepository->findWithoutFail($id);

        if (empty($brandTranslation)) {
            Flash::error('Brand not found');

            return redirect(route('admin.brands.index'));
        }


        // get Brand
        $brand = Brand::find( $brandTranslation->brand_id );

        // save Brand
        $brand = $this->saveBrand($request, $brand);

        // save BrandTranslation
        $brandTranslation = $this->saveBrandTranslation($request, $brand, $brandTranslation);


        Flash::success('Brand updated successfully.');

        return redirect(route('admin.brands.index'));
    }

    /**
     * Remove the specified BrandTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $brandTranslation = $this->brandTranslationRepository->findWithoutFail($id);

        if (empty($brandTranslation)) {
            Flash::error('Brand not found');

            return redirect(route('admin.brands.index'));
        }

        $this->brandTranslationRepository->delete($id);

        Flash::success('Brand deleted successfully.');

        return redirect(route('admin.brands.index'));
    }
}
