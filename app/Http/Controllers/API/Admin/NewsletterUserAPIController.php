<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateNewsletterUserAPIRequest;
use App\Http\Requests\API\Admin\UpdateNewsletterUserAPIRequest;
use App\Models\Admin\NewsletterUser;
use App\Repositories\Admin\NewsletterUserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class NewsletterUserController
 * @package App\Http\Controllers\API\Admin
 */

class NewsletterUserAPIController extends AppBaseController
{
    /** @var  NewsletterUserRepository */
    private $newsletterUserRepository;

    public function __construct(NewsletterUserRepository $newsletterUserRepo)
    {
        $this->newsletterUserRepository = $newsletterUserRepo;
    }

    /**
     * Display a listing of the NewsletterUser.
     * GET|HEAD /newsletterUsers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->newsletterUserRepository->pushCriteria(new RequestCriteria($request));
        $this->newsletterUserRepository->pushCriteria(new LimitOffsetCriteria($request));
        $newsletterUsers = $this->newsletterUserRepository->all();

        return $this->sendResponse($newsletterUsers->toArray(), 'Newsletter Users retrieved successfully');
    }

    /**
     * Store a newly created NewsletterUser in storage.
     * POST /newsletterUsers
     *
     * @param CreateNewsletterUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsletterUserAPIRequest $request)
    {
        $input = $request->all();

        $newsletterUsers = $this->newsletterUserRepository->create($input);

        return $this->sendResponse($newsletterUsers->toArray(), 'Newsletter User saved successfully');
    }

    /**
     * Display the specified NewsletterUser.
     * GET|HEAD /newsletterUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var NewsletterUser $newsletterUser */
        $newsletterUser = $this->newsletterUserRepository->findWithoutFail($id);

        if (empty($newsletterUser)) {
            return $this->sendError('Newsletter User not found');
        }

        return $this->sendResponse($newsletterUser->toArray(), 'Newsletter User retrieved successfully');
    }

    /**
     * Update the specified NewsletterUser in storage.
     * PUT/PATCH /newsletterUsers/{id}
     *
     * @param  int $id
     * @param UpdateNewsletterUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsletterUserAPIRequest $request)
    {
        $input = $request->all();

        /** @var NewsletterUser $newsletterUser */
        $newsletterUser = $this->newsletterUserRepository->findWithoutFail($id);

        if (empty($newsletterUser)) {
            return $this->sendError('Newsletter User not found');
        }

        $newsletterUser = $this->newsletterUserRepository->update($input, $id);

        return $this->sendResponse($newsletterUser->toArray(), 'NewsletterUser updated successfully');
    }

    /**
     * Remove the specified NewsletterUser from storage.
     * DELETE /newsletterUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var NewsletterUser $newsletterUser */
        $newsletterUser = $this->newsletterUserRepository->findWithoutFail($id);

        if (empty($newsletterUser)) {
            return $this->sendError('Newsletter User not found');
        }

        $newsletterUser->delete();

        return $this->sendResponse($id, 'Newsletter User deleted successfully');
    }
}
