<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateNewsletterUserRequest;
use App\Http\Requests\Admin\UpdateNewsletterUserRequest;
use App\Repositories\Admin\NewsletterUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NewsletterUserController extends AppBaseController
{
    /** @var  NewsletterUserRepository */
    private $newsletterUserRepository;

    public function __construct(NewsletterUserRepository $newsletterUserRepo)
    {
        $this->newsletterUserRepository = $newsletterUserRepo;
    }

    /**
     * Display a listing of the NewsletterUser.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->newsletterUserRepository->pushCriteria(new RequestCriteria($request));
        $newsletterUsers = $this->newsletterUserRepository->all();

        return view('admin.newsletter_users.index')
            ->with('newsletterUsers', $newsletterUsers);
    }

    /**
     * Show the form for creating a new NewsletterUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.newsletter_users.create');
    }

    /**
     * Store a newly created NewsletterUser in storage.
     *
     * @param CreateNewsletterUserRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsletterUserRequest $request)
    {
        $input = $request->all();

        $newsletterUser = $this->newsletterUserRepository->create($input);

        Flash::success('Newsletter User saved successfully.');

        return redirect(route('admin.newsletterUsers.index'));
    }

    /**
     * Display the specified NewsletterUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $newsletterUser = $this->newsletterUserRepository->findWithoutFail($id);

        if (empty($newsletterUser)) {
            Flash::error('Newsletter User not found');

            return redirect(route('admin.newsletterUsers.index'));
        }

        return view('admin.newsletter_users.show')->with('newsletterUser', $newsletterUser);
    }

    /**
     * Show the form for editing the specified NewsletterUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $newsletterUser = $this->newsletterUserRepository->findWithoutFail($id);

        if (empty($newsletterUser)) {
            Flash::error('Newsletter User not found');

            return redirect(route('admin.newsletterUsers.index'));
        }

        return view('admin.newsletter_users.edit')->with('newsletterUser', $newsletterUser);
    }

    /**
     * Update the specified NewsletterUser in storage.
     *
     * @param  int              $id
     * @param UpdateNewsletterUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsletterUserRequest $request)
    {
        $newsletterUser = $this->newsletterUserRepository->findWithoutFail($id);

        if (empty($newsletterUser)) {
            Flash::error('Newsletter User not found');

            return redirect(route('admin.newsletterUsers.index'));
        }

        $newsletterUser = $this->newsletterUserRepository->update($request->all(), $id);

        Flash::success('Newsletter User updated successfully.');

        return redirect(route('admin.newsletterUsers.index'));
    }

    /**
     * Remove the specified NewsletterUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $newsletterUser = $this->newsletterUserRepository->findWithoutFail($id);

        if (empty($newsletterUser)) {
            Flash::error('Newsletter User not found');

            return redirect(route('admin.newsletterUsers.index'));
        }

        $this->newsletterUserRepository->delete($id);

        Flash::success('Newsletter User deleted successfully.');

        return redirect(route('admin.newsletterUsers.index'));
    }
}
