<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateMultimediaAPIRequest;
use App\Http\Requests\API\Admin\UpdateMultimediaAPIRequest;
use App\Models\Admin\Multimedia;
use App\Repositories\Admin\MultimediaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MultimediaController
 * @package App\Http\Controllers\API\Admin
 */

class MultimediaAPIController extends AppBaseController
{
    /** @var  MultimediaRepository */
    private $multimediaRepository;

    public function __construct(MultimediaRepository $multimediaRepo)
    {
        $this->multimediaRepository = $multimediaRepo;
    }

    /**
     * Display a listing of the Multimedia.
     * GET|HEAD /multimedia
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->multimediaRepository->pushCriteria(new RequestCriteria($request));
        $this->multimediaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $multimedia = $this->multimediaRepository->all();

        return $this->sendResponse($multimedia->toArray(), 'Multimedia retrieved successfully');
    }

    /**
     * Store a newly created Multimedia in storage.
     * POST /multimedia
     *
     * @param CreateMultimediaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMultimediaAPIRequest $request)
    {
        $input = $request->all();

        $multimedia = $this->multimediaRepository->create($input);

        return $this->sendResponse($multimedia->toArray(), 'Multimedia saved successfully');
    }

    /**
     * Display the specified Multimedia.
     * GET|HEAD /multimedia/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Multimedia $multimedia */
        $multimedia = $this->multimediaRepository->findWithoutFail($id);

        if (empty($multimedia)) {
            return $this->sendError('Multimedia not found');
        }

        return $this->sendResponse($multimedia->toArray(), 'Multimedia retrieved successfully');
    }

    /**
     * Update the specified Multimedia in storage.
     * PUT/PATCH /multimedia/{id}
     *
     * @param  int $id
     * @param UpdateMultimediaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMultimediaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Multimedia $multimedia */
        $multimedia = $this->multimediaRepository->findWithoutFail($id);

        if (empty($multimedia)) {
            return $this->sendError('Multimedia not found');
        }

        $multimedia = $this->multimediaRepository->update($input, $id);

        return $this->sendResponse($multimedia->toArray(), 'Multimedia updated successfully');
    }

    /**
     * Remove the specified Multimedia from storage.
     * DELETE /multimedia/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Multimedia $multimedia */
        $multimedia = $this->multimediaRepository->findWithoutFail($id);

        if (empty($multimedia)) {
            return $this->sendError('Multimedia not found');
        }

        $multimedia->delete();

        return $this->sendResponse($id, 'Multimedia deleted successfully');
    }
}
