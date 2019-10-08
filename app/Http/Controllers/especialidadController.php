<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateespecialidadRequest;
use App\Http\Requests\UpdateespecialidadRequest;
use App\Repositories\especialidadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class especialidadController extends AppBaseController
{
    /** @var  especialidadRepository */
    private $especialidadRepository;

    public function __construct(especialidadRepository $especialidadRepo)
    {
        $this->especialidadRepository = $especialidadRepo;
    }

    /**
     * Display a listing of the especialidad.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $especialidads = $this->especialidadRepository->all();

        return view('especialidads.index')
            ->with('especialidads', $especialidads);
    }

    /**
     * Show the form for creating a new especialidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('especialidads.create');
    }

    /**
     * Store a newly created especialidad in storage.
     *
     * @param CreateespecialidadRequest $request
     *
     * @return Response
     */
    public function store(CreateespecialidadRequest $request)
    {
        $input = $request->all();

        $especialidad = $this->especialidadRepository->create($input);

        Flash::success('Especialidad saved successfully.');

        return redirect(route('especialidads.index'));
    }

    /**
     * Display the specified especialidad.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $especialidad = $this->especialidadRepository->find($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad not found');

            return redirect(route('especialidads.index'));
        }

        return view('especialidads.show')->with('especialidad', $especialidad);
    }

    /**
     * Show the form for editing the specified especialidad.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $especialidad = $this->especialidadRepository->find($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad not found');

            return redirect(route('especialidads.index'));
        }

        return view('especialidads.edit')->with('especialidad', $especialidad);
    }

    /**
     * Update the specified especialidad in storage.
     *
     * @param int $id
     * @param UpdateespecialidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateespecialidadRequest $request)
    {
        $especialidad = $this->especialidadRepository->find($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad not found');

            return redirect(route('especialidads.index'));
        }

        $especialidad = $this->especialidadRepository->update($request->all(), $id);

        Flash::success('Especialidad updated successfully.');

        return redirect(route('especialidads.index'));
    }

    /**
     * Remove the specified especialidad from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $especialidad = $this->especialidadRepository->find($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad not found');

            return redirect(route('especialidads.index'));
        }

        $this->especialidadRepository->delete($id);

        Flash::success('Especialidad deleted successfully.');

        return redirect(route('especialidads.index'));
    }
}
