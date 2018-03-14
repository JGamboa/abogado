<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIntervinienteRequest;
use App\Http\Requests\UpdateIntervinienteRequest;
use App\Repositories\IntervinienteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Region as Region;
use App\Models\Isapre as Isapre;

class IntervinienteController extends AppBaseController
{
    /** @var  IntervinienteRepository */
    private $intervinienteRepository;

    public function __construct(IntervinienteRepository $intervinienteRepo)
    {
        $this->intervinienteRepository = $intervinienteRepo;
    }

    /**
     * Display a listing of the Interviniente.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->intervinienteRepository->pushCriteria(new RequestCriteria($request));
        $intervinientes = $this->intervinienteRepository->all();

        return view('intervinientes.index')
            ->with('intervinientes', $intervinientes);
    }

    /**
     * Show the form for creating a new Interviniente.
     *
     * @return Response
     */
    public function create()
    {

        $regiones = \App\Models\Region::pluck('nombre', 'id')->all();
        $provincias = \App\Models\Provincia::pluck('nombre', 'id')->all();
        $comunas = \App\Models\Comuna::pluck('nombre', 'id')->all();
        $isapres =  Isapre::pluck('nombre', 'id')->all();

        return view('intervinientes.create')->with(['regiones'=>$regiones,
                                                        'comunas'=>$comunas,
                                                        'provincias' =>$provincias,
                                                        'isapres'=>$isapres]);
    }

    /**
     * Store a newly created Interviniente in storage.
     *
     * @param CreateIntervinienteRequest $request
     *
     * @return Response
     */
    public function store(CreateIntervinienteRequest $request)
    {
        $input = $request->all();

        $interviniente = $this->intervinienteRepository->create($input);

        Flash::success('Interviniente saved successfully.');

        return redirect(route('intervinientes.index'));
    }

    /**
     * Display the specified Interviniente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $interviniente = $this->intervinienteRepository->findWithoutFail($id);

        if (empty($interviniente)) {
            Flash::error('Interviniente not found');

            return redirect(route('intervinientes.index'));
        }

        return view('intervinientes.show')->with('interviniente', $interviniente);
    }

    /**
     * Show the form for editing the specified Interviniente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $interviniente = $this->intervinienteRepository->findWithoutFail($id);

        if (empty($interviniente)) {
            Flash::error('Interviniente not found');

            return redirect(route('intervinientes.index'));
        }

        $regiones = \App\Models\Region::pluck('nombre', 'id')->all();
        $provincias = \App\Models\Provincia::pluck('nombre', 'id')->all();
        $comunas = \App\Models\Comuna::pluck('nombre', 'id')->all();
        $isapres =  Isapre::pluck('nombre', 'id')->all();

        return view('intervinientes.edit')->with(['interviniente' => $interviniente,
                                                            'regiones'=>$regiones,
                                                            'comunas'=>$comunas,
                                                            'provincias' =>$provincias,
                                                            'isapres'=>$isapres]);
    }

    /**
     * Update the specified Interviniente in storage.
     *
     * @param  int              $id
     * @param UpdateIntervinienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIntervinienteRequest $request)
    {
        $interviniente = $this->intervinienteRepository->findWithoutFail($id);

        if (empty($interviniente)) {
            Flash::error('Interviniente not found');

            return redirect(route('intervinientes.index'));
        }

        $interviniente = $this->intervinienteRepository->update($request->all(), $id);

        Flash::success('Interviniente updated successfully.');

        return redirect(route('intervinientes.index'));
    }

    /**
     * Remove the specified Interviniente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $interviniente = $this->intervinienteRepository->findWithoutFail($id);

        if (empty($interviniente)) {
            Flash::error('Interviniente not found');

            return redirect(route('intervinientes.index'));
        }

        $this->intervinienteRepository->delete($id);

        Flash::success('Interviniente deleted successfully.');

        return redirect(route('intervinientes.index'));
    }
}
