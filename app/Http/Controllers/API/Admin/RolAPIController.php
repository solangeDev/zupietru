<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateRolAPIRequest;
use App\Http\Requests\API\Admin\UpdateRolAPIRequest;
use App\Models\Admin\Rol;
use App\Repositories\Admin\RolRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RolController
 * @package App\Http\Controllers\API\Admin
 */

class RolAPIController extends AppBaseController
{
    /** @var  RolRepository */
    private $rolRepository;

    public function __construct(RolRepository $rolRepo)
    {
        $this->rolRepository = $rolRepo;
    }

    /**
     * Display a listing of the Rol.
     * GET|HEAD /rols
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rolRepository->pushCriteria(new RequestCriteria($request));
        $this->rolRepository->pushCriteria(new LimitOffsetCriteria($request));
        $rols = $this->rolRepository->all();

        return $this->sendResponse($rols->toArray(), 'Rols retrieved successfully');
    }

    /**
     * Store a newly created Rol in storage.
     * POST /rols
     *
     * @param CreateRolAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRolAPIRequest $request)
    {
        $input = $request->all();

        $rols = $this->rolRepository->create($input);

        return $this->sendResponse($rols->toArray(), 'Rol saved successfully');
    }

    /**
     * Display the specified Rol.
     * GET|HEAD /rols/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Rol $rol */
        $rol = $this->rolRepository->findWithoutFail($id);

        if (empty($rol)) {
            return $this->sendError('Rol not found');
        }

        return $this->sendResponse($rol->toArray(), 'Rol retrieved successfully');
    }

    /**
     * Update the specified Rol in storage.
     * PUT/PATCH /rols/{id}
     *
     * @param  int $id
     * @param UpdateRolAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRolAPIRequest $request)
    {
        $input = $request->all();

        /** @var Rol $rol */
        $rol = $this->rolRepository->findWithoutFail($id);

        if (empty($rol)) {
            return $this->sendError('Rol not found');
        }

        $rol = $this->rolRepository->update($input, $id);

        return $this->sendResponse($rol->toArray(), 'Rol updated successfully');
    }

    /**
     * Remove the specified Rol from storage.
     * DELETE /rols/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Rol $rol */
        $rol = $this->rolRepository->findWithoutFail($id);

        if (empty($rol)) {
            return $this->sendError('Rol not found');
        }

        $rol->delete();

        return $this->sendResponse($id, 'Rol deleted successfully');
    }
}
