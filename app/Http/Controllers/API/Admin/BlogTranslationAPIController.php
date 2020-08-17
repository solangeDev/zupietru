<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateBlogTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateBlogTranslationAPIRequest;
use App\Models\Admin\BlogTranslation;
use App\Repositories\Admin\BlogTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BlogTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class BlogTranslationAPIController extends AppBaseController
{
    /** @var  BlogTranslationRepository */
    private $blogTranslationRepository;

    public function __construct(BlogTranslationRepository $blogTranslationRepo)
    {
        $this->blogTranslationRepository = $blogTranslationRepo;
    }

    /**
     * Display a listing of the BlogTranslation.
     * GET|HEAD /blogTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->blogTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->blogTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $blogTranslations = $this->blogTranslationRepository->all();

        return $this->sendResponse($blogTranslations->toArray(), 'Blog Translations retrieved successfully');
    }

    /**
     * Store a newly created BlogTranslation in storage.
     * POST /blogTranslations
     *
     * @param CreateBlogTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBlogTranslationAPIRequest $request)
    {
        $input = $request->all();

        $blogTranslations = $this->blogTranslationRepository->create($input);

        return $this->sendResponse($blogTranslations->toArray(), 'Blog Translation saved successfully');
    }

    /**
     * Display the specified BlogTranslation.
     * GET|HEAD /blogTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BlogTranslation $blogTranslation */
        $blogTranslation = $this->blogTranslationRepository->findWithoutFail($id);

        if (empty($blogTranslation)) {
            return $this->sendError('Blog Translation not found');
        }

        return $this->sendResponse($blogTranslation->toArray(), 'Blog Translation retrieved successfully');
    }

    /**
     * Update the specified BlogTranslation in storage.
     * PUT/PATCH /blogTranslations/{id}
     *
     * @param  int $id
     * @param UpdateBlogTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBlogTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var BlogTranslation $blogTranslation */
        $blogTranslation = $this->blogTranslationRepository->findWithoutFail($id);

        if (empty($blogTranslation)) {
            return $this->sendError('Blog Translation not found');
        }

        $blogTranslation = $this->blogTranslationRepository->update($input, $id);

        return $this->sendResponse($blogTranslation->toArray(), 'BlogTranslation updated successfully');
    }

    /**
     * Remove the specified BlogTranslation from storage.
     * DELETE /blogTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BlogTranslation $blogTranslation */
        $blogTranslation = $this->blogTranslationRepository->findWithoutFail($id);

        if (empty($blogTranslation)) {
            return $this->sendError('Blog Translation not found');
        }

        $blogTranslation->delete();

        return $this->sendResponse($id, 'Blog Translation deleted successfully');
    }
}
