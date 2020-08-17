<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateServiceTranslationRequest;
use App\Http\Requests\Admin\UpdateServiceTranslationRequest;
use App\Repositories\Admin\ServiceTranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServiceTranslationController extends AppBaseController
{
    /** @var  ServiceTranslationRepository */
    private $serviceTranslationRepository;

    public function __construct(ServiceTranslationRepository $serviceTranslationRepo)
    {
        $this->serviceTranslationRepository = $serviceTranslationRepo;
    }

    /**
     * Display a listing of the ServiceTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviceTranslationRepository->pushCriteria(new RequestCriteria($request));
        $serviceTranslations = $this->serviceTranslationRepository->all();

        return view('admin.rooms.service_translations.index')
            ->with('serviceTranslations', $serviceTranslations);
    }

    /**
     * Show the form for creating a new ServiceTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.rooms.service_translations.create');
    }

    /**
     * Store a newly created ServiceTranslation in storage.
     *
     * @param CreateServiceTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceTranslationRequest $request)
    {
        $input = $request->all();

        $serviceTranslation = $this->serviceTranslationRepository->create($input);

        Flash::success('Service Translation saved successfully.');

        return redirect(route('admin.rooms.serviceTranslations.index'));
    }

    /**
     * Display the specified ServiceTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceTranslation = $this->serviceTranslationRepository->findWithoutFail($id);

        if (empty($serviceTranslation)) {
            Flash::error('Service Translation not found');

            return redirect(route('admin.rooms.serviceTranslations.index'));
        }

        return view('admin.rooms.service_translations.show')->with('serviceTranslation', $serviceTranslation);
    }

    /**
     * Show the form for editing the specified ServiceTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceTranslation = $this->serviceTranslationRepository->findWithoutFail($id);

        if (empty($serviceTranslation)) {
            Flash::error('Service Translation not found');

            return redirect(route('admin.rooms.serviceTranslations.index'));
        }

        return view('admin.rooms.service_translations.edit')->with('serviceTranslation', $serviceTranslation);
    }

    /**
     * Update the specified ServiceTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateServiceTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceTranslationRequest $request)
    {
        $serviceTranslation = $this->serviceTranslationRepository->findWithoutFail($id);

        if (empty($serviceTranslation)) {
            Flash::error('Service Translation not found');

            return redirect(route('admin.rooms.serviceTranslations.index'));
        }

        $serviceTranslation = $this->serviceTranslationRepository->update($request->all(), $id);

        Flash::success('Service Translation updated successfully.');

        return redirect(route('admin.rooms.serviceTranslations.index'));
    }

    /**
     * Remove the specified ServiceTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceTranslation = $this->serviceTranslationRepository->findWithoutFail($id);

        if (empty($serviceTranslation)) {
            Flash::error('Service Translation not found');

            return redirect(route('admin.rooms.serviceTranslations.index'));
        }

        $this->serviceTranslationRepository->delete($id);

        Flash::success('Service Translation deleted successfully.');

        return redirect(route('admin.rooms.serviceTranslations.index'));
    }
}
