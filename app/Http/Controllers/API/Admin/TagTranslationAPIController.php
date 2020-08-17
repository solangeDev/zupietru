<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateTagTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateTagTranslationAPIRequest;
use App\Models\Admin\TagTranslation;
use App\Repositories\Admin\TagTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TagTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class TagTranslationAPIController extends AppBaseController
{
    /** @var  TagTranslationRepository */
    private $tagTranslationRepository;

    public function __construct(TagTranslationRepository $tagTranslationRepo)
    {
        $this->tagTranslationRepository = $tagTranslationRepo;
    }

    /**
     * Display a listing of the TagTranslation.
     * GET|HEAD /tagTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tagTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->tagTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tagTranslations = $this->tagTranslationRepository->all();

        return $this->sendResponse($tagTranslations->toArray(), 'Tag Translations retrieved successfully');
    }

    /**
     * Store a newly created TagTranslation in storage.
     * POST /tagTranslations
     *
     * @param CreateTagTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTagTranslationAPIRequest $request)
    {
        $input = $request->all();

        $tagTranslations = $this->tagTranslationRepository->create($input);

        return $this->sendResponse($tagTranslations->toArray(), 'Tag Translation saved successfully');
    }

    /**
     * Display the specified TagTranslation.
     * GET|HEAD /tagTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TagTranslation $tagTranslation */
        $tagTranslation = $this->tagTranslationRepository->findWithoutFail($id);

        if (empty($tagTranslation)) {
            return $this->sendError('Tag Translation not found');
        }

        return $this->sendResponse($tagTranslation->toArray(), 'Tag Translation retrieved successfully');
    }

    /**
     * Update the specified TagTranslation in storage.
     * PUT/PATCH /tagTranslations/{id}
     *
     * @param  int $id
     * @param UpdateTagTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTagTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var TagTranslation $tagTranslation */
        $tagTranslation = $this->tagTranslationRepository->findWithoutFail($id);

        if (empty($tagTranslation)) {
            return $this->sendError('Tag Translation not found');
        }

        $tagTranslation = $this->tagTranslationRepository->update($input, $id);

        return $this->sendResponse($tagTranslation->toArray(), 'TagTranslation updated successfully');
    }

    /**
     * Remove the specified TagTranslation from storage.
     * DELETE /tagTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TagTranslation $tagTranslation */
        $tagTranslation = $this->tagTranslationRepository->findWithoutFail($id);

        if (empty($tagTranslation)) {
            return $this->sendError('Tag Translation not found');
        }

        $tagTranslation->delete();

        return $this->sendResponse($id, 'Tag Translation deleted successfully');
    }
}
