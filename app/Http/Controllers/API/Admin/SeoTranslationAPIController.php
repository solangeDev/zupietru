<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateSeoTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateSeoTranslationAPIRequest;
use App\Models\Admin\SeoTranslation;
use App\Repositories\Admin\SeoTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SeoTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class SeoTranslationAPIController extends AppBaseController
{
    /** @var  SeoTranslationRepository */
    private $seoTranslationRepository;

    public function __construct(SeoTranslationRepository $seoTranslationRepo)
    {
        $this->seoTranslationRepository = $seoTranslationRepo;
    }

    /**
     * Display a listing of the SeoTranslation.
     * GET|HEAD /seoTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->seoTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->seoTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $seoTranslations = $this->seoTranslationRepository->all();

        return $this->sendResponse($seoTranslations->toArray(), 'Seo Translations retrieved successfully');
    }

    /**
     * Store a newly created SeoTranslation in storage.
     * POST /seoTranslations
     *
     * @param CreateSeoTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSeoTranslationAPIRequest $request)
    {
        $input = $request->all();

        $seoTranslations = $this->seoTranslationRepository->create($input);

        return $this->sendResponse($seoTranslations->toArray(), 'Seo Translation saved successfully');
    }

    /**
     * Display the specified SeoTranslation.
     * GET|HEAD /seoTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SeoTranslation $seoTranslation */
        $seoTranslation = $this->seoTranslationRepository->findWithoutFail($id);

        if (empty($seoTranslation)) {
            return $this->sendError('Seo Translation not found');
        }

        return $this->sendResponse($seoTranslation->toArray(), 'Seo Translation retrieved successfully');
    }

    /**
     * Update the specified SeoTranslation in storage.
     * PUT/PATCH /seoTranslations/{id}
     *
     * @param  int $id
     * @param UpdateSeoTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeoTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var SeoTranslation $seoTranslation */
        $seoTranslation = $this->seoTranslationRepository->findWithoutFail($id);

        if (empty($seoTranslation)) {
            return $this->sendError('Seo Translation not found');
        }

        $seoTranslation = $this->seoTranslationRepository->update($input, $id);

        return $this->sendResponse($seoTranslation->toArray(), 'SeoTranslation updated successfully');
    }

    /**
     * Remove the specified SeoTranslation from storage.
     * DELETE /seoTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SeoTranslation $seoTranslation */
        $seoTranslation = $this->seoTranslationRepository->findWithoutFail($id);

        if (empty($seoTranslation)) {
            return $this->sendError('Seo Translation not found');
        }

        $seoTranslation->delete();

        return $this->sendResponse($id, 'Seo Translation deleted successfully');
    }
}
