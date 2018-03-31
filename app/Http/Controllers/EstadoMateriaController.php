<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEstadoMateriaRequest;
use App\Http\Requests\UpdateEstadoMateriaRequest;
use App\Repositories\EstadoMateriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EstadoMateriaController extends AppBaseController
{
    /** @var  EstadoMateriaRepository */
    private $estadoMateriaRepository;

    public function __construct(EstadoMateriaRepository $estadoMateriaRepo)
    {
        $this->estadoMateriaRepository = $estadoMateriaRepo;
    }

    /**
     * Display a listing of the EstadoMateria.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estadoMateriaRepository->pushCriteria(new RequestCriteria($request));
        $estadosMaterias = $this->estadoMateriaRepository->all();

        return view('estados_materias.index')
            ->with('estadosMaterias', $estadosMaterias);
    }

    /**
     * Show the form for creating a new EstadoMateria.
     *
     * @return Response
     */
    public function create()
    {
        return view('estados_materias.create');
    }

    /**
     * Store a newly created EstadoMateria in storage.
     *
     * @param CreateEstadoMateriaRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoMateriaRequest $request)
    {
        $input = $request->all();

        $estadoMateria = $this->estadoMateriaRepository->create($input);

        Flash::success('Estado Materia saved successfully.');

        return redirect(route('estadosMaterias.index'));
    }

    /**
     * Display the specified EstadoMateria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoMateria = $this->estadoMateriaRepository->findWithoutFail($id);

        if (empty($estadoMateria)) {
            Flash::error('Estado Materia not found');

            return redirect(route('estadosMaterias.index'));
        }

        return view('estados_materias.show')->with('estadoMateria', $estadoMateria);
    }

    /**
     * Show the form for editing the specified EstadoMateria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoMateria = $this->estadoMateriaRepository->findWithoutFail($id);

        if (empty($estadoMateria)) {
            Flash::error('Estado Materia not found');

            return redirect(route('estadosMaterias.index'));
        }

        return view('estados_materias.edit')->with('estadoMateria', $estadoMateria);
    }

    /**
     * Update the specified EstadoMateria in storage.
     *
     * @param  int              $id
     * @param UpdateEstadoMateriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoMateriaRequest $request)
    {
        $estadoMateria = $this->estadoMateriaRepository->findWithoutFail($id);

        if (empty($estadoMateria)) {
            Flash::error('Estado Materia not found');

            return redirect(route('estadosMaterias.index'));
        }

        $estadoMateria = $this->estadoMateriaRepository->update($request->all(), $id);

        Flash::success('Estado Materia updated successfully.');

        return redirect(route('estadosMaterias.index'));
    }

    /**
     * Remove the specified EstadoMateria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoMateria = $this->estadoMateriaRepository->findWithoutFail($id);

        if (empty($estadoMateria)) {
            Flash::error('Estado Materia not found');

            return redirect(route('estadosMaterias.index'));
        }

        $this->estadoMateriaRepository->delete($id);

        Flash::success('Estado Materia deleted successfully.');

        return redirect(route('estadosMaterias.index'));
    }
}
