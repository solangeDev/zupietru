<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateBlogCategoryTranslationAPIRequest;
use App\Http\Requests\API\Admin\UpdateBlogCategoryTranslationAPIRequest;
use App\Models\Admin\BlogCategoryTranslation;
use App\Repositories\Admin\BlogCategoryTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BlogCategoryTranslationController
 * @package App\Http\Controllers\API\Admin
 */

class BlogCategoryTranslationAPIController extends AppBaseController
{
    /** @var  BlogCategoryTranslationRepository */
    private $blogCategoryTranslationRepository;

    public function __construct(BlogCategoryTranslationRepository $blogCategoryTranslationRepo)
    {
        $this->blogCategoryTranslationRepository = $blogCategoryTranslationRepo;
    }

    /**
     * Display a listing of the BlogCategoryTranslation.
     * GET|HEAD /blogCategoryTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->blogCategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->blogCategoryTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $blogCategoryTranslations = $this->blogCategoryTranslationRepository->all();

        return $this->sendResponse($blogCategoryTranslations->toArray(), 'Blog Category Translations retrieved successfully');
    }

    /**
     * Store a newly created BlogCategoryTranslation in storage.
     * POST /blogCategoryTranslations
     *
     * @param CreateBlogCategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBlogCategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        $blogCategoryTranslations = $this->blogCategoryTranslationRepository->create($input);

        return $this->sendResponse($blogCategoryTranslations->toArray(), 'Blog Category Translation saved successfully');
    }

    /**
     * Display the specified BlogCategoryTranslation.
     * GET|HEAD /blogCategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BlogCategoryTranslation $blogCategoryTranslation */
        $blogCategoryTranslation = $this->blogCategoryTranslationRepository->findWithoutFail($id);

        if (empty($blogCategoryTranslation)) {
            return $this->sendError('Blog Category Translation not found');
        }

        return $this->sendResponse($blogCategoryTranslation->toArray(), 'Blog Category Translation retrieved successfully');
    }

    /**
     * Update the specified BlogCategoryTranslation in storage.
     * PUT/PATCH /blogCategoryTranslations/{id}
     *
     * @param  int $id
     * @param UpdateBlogCategoryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBlogCategoryTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var BlogCategoryTranslation $blogCategoryTranslation */
        $blogCategoryTranslation = $this->blogCategoryTranslationRepository->findWithoutFail($id);

        if (empty($blogCategoryTranslation)) {
            return $this->sendError('Blog Category Translation not found');
        }

        $blogCategoryTranslation = $this->blogCategoryTranslationRepository->update($input, $id);

        return $this->sendResponse($blogCategoryTranslation->toArray(), 'BlogCategoryTranslation updated successfully');
    }

    /**
     * Remove the specified BlogCategoryTranslation from storage.
     * DELETE /blogCategoryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BlogCategoryTranslation $blogCategoryTranslation */
        $blogCategoryTranslation = $this->blogCategoryTranslationRepository->findWithoutFail($id);

        if (empty($blogCategoryTranslation)) {
            return $this->sendError('Blog Category Translation not found');
        }

        $blogCategoryTranslation->delete();

        return $this->sendResponse($id, 'Blog Category Translation deleted successfully');
    }
}
