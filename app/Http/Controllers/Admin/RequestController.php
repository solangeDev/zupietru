<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateRequestRequest;
use App\Http\Requests\Admin\UpdateRequestRequest;
use App\Repositories\Admin\RequestRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RequestController extends AppBaseController
{
    /** @var  RequestRepository */
    private $requestRepository;

    public function __construct(RequestRepository $requestRepo)
    {
        $this->requestRepository = $requestRepo;
    }

    /**
     * Display a listing of the Request.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //dd('gg');
        $this->requestRepository->pushCriteria(new RequestCriteria($request));
        $requests = $this->requestRepository->all();

        return view('admin.requests.index')
            ->with('requests', $requests);
    }

    /**
     * Show the form for creating a new Request.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.requests.create');
    }

    /**
     * Store a newly created Request in storage.
     *
     * @param CreateRequestRequest $request
     *
     * @return Response
     */
    public function store(CreateRequestRequest $request)
    {
        $input = $request->all();

        $request = $this->requestRepository->create($input);

        Flash::success('Request saved successfully.');

        return redirect(route('admin.requests.index'));
    }

    /**
     * Display the specified Request.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $request = $this->requestRepository->findWithoutFail($id);

        if (empty($request)) {
            Flash::error('Request not found');

            return redirect(route('admin.requests.index'));
        }

        return view('admin.requests.show')->with('request', $request);
    }

    /**
     * Show the form for editing the specified Request.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $request = $this->requestRepository->findWithoutFail($id);

        if (empty($request)) {
            Flash::error('Request not found');

            return redirect(route('admin.requests.index'));
        }

        return view('admin.requests.edit')->with('request', $request);
    }

    /**
     * Update the specified Request in storage.
     *
     * @param  int              $id
     * @param UpdateRequestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequestRequest $request)
    {
        $request = $this->requestRepository->findWithoutFail($id);

        if (empty($request)) {
            Flash::error('Request not found');

            return redirect(route('admin.requests.index'));
        }

        $request = $this->requestRepository->update($request->all(), $id);

        Flash::success('Request updated successfully.');

        return redirect(route('admin.requests.index'));
    }

    /**
     * Remove the specified Request from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $request = $this->requestRepository->findWithoutFail($id);

        if (empty($request)) {
            Flash::error('Request not found');

            return redirect(route('admin.requests.index'));
        }

        $this->requestRepository->delete($id);

        Flash::success('Request deleted successfully.');

        return redirect(route('admin.requests.index'));
    }
}
