<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEstadoCasoRequest;
use App\Http\Requests\UpdateEstadoCasoRequest;
use App\Repositories\EstadoCasoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EstadoCasoController extends AppBaseController
{
    /** @var  EstadoCasoRepository */
    private $estadoCasoRepository;

    public function __construct(EstadoCasoRepository $estadoCasoRepo)
    {
        $this->estadoCasoRepository = $estadoCasoRepo;
    }

    /**
     * Display a listing of the EstadoCaso.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estadoCasoRepository->pushCriteria(new RequestCriteria($request));
        $estadoscasos = $this->estadoCasoRepository->all();

        return view('estadoscasos.index')
            ->with('estadoscasos', $estadoscasos);
    }

    /**
     * Show the form for creating a new EstadoCaso.
     *
     * @return Response
     */
    public function create()
    {
        return view('estadoscasos.create');
    }

    /**
     * Store a newly created EstadoCaso in storage.
     *
     * @param CreateEstadoCasoRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoCasoRequest $request)
    {
        $input = $request->all();

        $estadoCaso = $this->estadoCasoRepository->create($input);

        Flash::success('Estado Caso saved successfully.');

        return redirect(route('estadoscasos.index'));
    }

    /**
     * Display the specified EstadoCaso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoCaso = $this->estadoCasoRepository->findWithoutFail($id);

        if (empty($estadoCaso)) {
            Flash::error('Estado Caso not found');

            return redirect(route('estadoscasos.index'));
        }

        return view('estadoscasos.show')->with('estadoCaso', $estadoCaso);
    }

    /**
     * Show the form for editing the specified EstadoCaso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoCaso = $this->estadoCasoRepository->findWithoutFail($id);

        if (empty($estadoCaso)) {
            Flash::error('Estado Caso not found');

            return redirect(route('estadoscasos.index'));
        }

        return view('estadoscasos.edit')->with('estadoCaso', $estadoCaso);
    }

    /**
     * Update the specified EstadoCaso in storage.
     *
     * @param  int              $id
     * @param UpdateEstadoCasoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoCasoRequest $request)
    {
        $estadoCaso = $this->estadoCasoRepository->findWithoutFail($id);

        if (empty($estadoCaso)) {
            Flash::error('Estado Caso not found');

            return redirect(route('estadoscasos.index'));
        }

        $estadoCaso = $this->estadoCasoRepository->update($request->all(), $id);

        Flash::success('Estado Caso updated successfully.');

        return redirect(route('estadoscasos.index'));
    }

    /**
     * Remove the specified EstadoCaso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoCaso = $this->estadoCasoRepository->findWithoutFail($id);

        if (empty($estadoCaso)) {
            Flash::error('Estado Caso not found');

            return redirect(route('estadoscasos.index'));
        }

        $this->estadoCasoRepository->delete($id);

        Flash::success('Estado Caso deleted successfully.');

        return redirect(route('estadoscasos.index'));
    }
}
