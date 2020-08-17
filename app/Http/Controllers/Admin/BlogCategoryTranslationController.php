<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateBlogCategoryTranslationRequest;
use App\Http\Requests\Admin\UpdateBlogCategoryTranslationRequest;
use App\Repositories\Admin\BlogCategoryTranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BlogCategoryTranslationController extends AppBaseController
{
    /** @var  BlogCategoryTranslationRepository */
    private $blogCategoryTranslationRepository;

    public function __construct(BlogCategoryTranslationRepository $blogCategoryTranslationRepo)
    {
        $this->blogCategoryTranslationRepository = $blogCategoryTranslationRepo;
    }

    /**
     * Display a listing of the BlogCategoryTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->blogCategoryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $blogCategoryTranslations = $this->blogCategoryTranslationRepository->all();

        return view('admin.blogs.blog_category_translations.index')
            ->with('blogCategoryTranslations', $blogCategoryTranslations);
    }

    /**
     * Show the form for creating a new BlogCategoryTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.blogs.blog_category_translations.create');
    }

    /**
     * Store a newly created BlogCategoryTranslation in storage.
     *
     * @param CreateBlogCategoryTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateBlogCategoryTranslationRequest $request)
    {
        $input = $request->all();

        $blogCategoryTranslation = $this->blogCategoryTranslationRepository->create($input);

        Flash::success('Blog Category Translation saved successfully.');

        return redirect(route('admin.blogs.blogCategoryTranslations.index'));
    }

    /**
     * Display the specified BlogCategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $blogCategoryTranslation = $this->blogCategoryTranslationRepository->findWithoutFail($id);

        if (empty($blogCategoryTranslation)) {
            Flash::error('Blog Category Translation not found');

            return redirect(route('admin.blogs.blogCategoryTranslations.index'));
        }

        return view('admin.blogs.blog_category_translations.show')->with('blogCategoryTranslation', $blogCategoryTranslation);
    }

    /**
     * Show the form for editing the specified BlogCategoryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $blogCategoryTranslation = $this->blogCategoryTranslationRepository->findWithoutFail($id);

        if (empty($blogCategoryTranslation)) {
            Flash::error('Blog Category Translation not found');

            return redirect(route('admin.blogs.blogCategoryTranslations.index'));
        }

        return view('admin.blogs.blog_category_translations.edit')->with('blogCategoryTranslation', $blogCategoryTranslation);
    }

    /**
     * Update the specified BlogCategoryTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateBlogCategoryTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBlogCategoryTranslationRequest $request)
    {
        $blogCategoryTranslation = $this->blogCategoryTranslationRepository->findWithoutFail($id);

        if (empty($blogCategoryTranslation)) {
            Flash::error('Blog Category Translation not found');

            return redirect(route('admin.blogs.blogCategoryTranslations.index'));
        }

        $blogCategoryTranslation = $this->blogCategoryTranslationRepository->update($request->all(), $id);

        Flash::success('Blog Category Translation updated successfully.');

        return redirect(route('admin.blogs.blogCategoryTranslations.index'));
    }

    /**
     * Remove the specified BlogCategoryTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $blogCategoryTranslation = $this->blogCategoryTranslationRepository->findWithoutFail($id);

        if (empty($blogCategoryTranslation)) {
            Flash::error('Blog Category Translation not found');

            return redirect(route('admin.blogs.blogCategoryTranslations.index'));
        }

        $this->blogCategoryTranslationRepository->delete($id);

        Flash::success('Blog Category Translation deleted successfully.');

        return redirect(route('admin.blogs.blogCategoryTranslations.index'));
    }
}
