<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateSeoTranslationRequest;
use App\Http\Requests\Admin\UpdateSeoTranslationRequest;
use App\Repositories\Admin\SeoTranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SeoTranslationController extends AppBaseController
{
    /** @var  SeoTranslationRepository */
    private $seoTranslationRepository;

    public function __construct(SeoTranslationRepository $seoTranslationRepo)
    {
        $this->seoTranslationRepository = $seoTranslationRepo;
    }

    /**
     * Display a listing of the SeoTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->seoTranslationRepository->pushCriteria(new RequestCriteria($request));
        $seoTranslations = $this->seoTranslationRepository->all();

        return view('admin.utils.seo_translations.index')
            ->with('seoTranslations', $seoTranslations);
    }

    /**
     * Show the form for creating a new SeoTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.utils.seo_translations.create');
    }

    /**
     * Store a newly created SeoTranslation in storage.
     *
     * @param CreateSeoTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateSeoTranslationRequest $request)
    {
        $input = $request->all();

        $seoTranslation = $this->seoTranslationRepository->create($input);

        Flash::success('Seo Translation saved successfully.');

        return redirect(route('admin.utils.seoTranslations.index'));
    }

    /**
     * Display the specified SeoTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $seoTranslation = $this->seoTranslationRepository->findWithoutFail($id);

        if (empty($seoTranslation)) {
            Flash::error('Seo Translation not found');

            return redirect(route('admin.utils.seoTranslations.index'));
        }

        return view('admin.utils.seo_translations.show')->with('seoTranslation', $seoTranslation);
    }

    /**
     * Show the form for editing the specified SeoTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $seoTranslation = $this->seoTranslationRepository->findWithoutFail($id);

        if (empty($seoTranslation)) {
            Flash::error('Seo Translation not found');

            return redirect(route('admin.utils.seoTranslations.index'));
        }

        return view('admin.utils.seo_translations.edit')->with('seoTranslation', $seoTranslation);
    }

    /**
     * Update the specified SeoTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateSeoTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeoTranslationRequest $request)
    {
        $seoTranslation = $this->seoTranslationRepository->findWithoutFail($id);

        if (empty($seoTranslation)) {
            Flash::error('Seo Translation not found');

            return redirect(route('admin.utils.seoTranslations.index'));
        }

        $seoTranslation = $this->seoTranslationRepository->update($request->all(), $id);

        Flash::success('Seo Translation updated successfully.');

        return redirect(route('admin.utils.seoTranslations.index'));
    }

    /**
     * Remove the specified SeoTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $seoTranslation = $this->seoTranslationRepository->findWithoutFail($id);

        if (empty($seoTranslation)) {
            Flash::error('Seo Translation not found');

            return redirect(route('admin.utils.seoTranslations.index'));
        }

        $this->seoTranslationRepository->delete($id);

        Flash::success('Seo Translation deleted successfully.');

        return redirect(route('admin.utils.seoTranslations.index'));
    }
}
