<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCasoRequest;
use App\Http\Requests\UpdateCasoRequest;
use App\Repositories\CasoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Empresa;
use App\Models\Materia;
use App\Models\EstadoCaso;
use App\Models\Corte;

class CasoController extends AppBaseController
{
    /** @var  CasoRepository */
    private $casoRepository;

    public function __construct(CasoRepository $casoRepo)
    {
        $this->casoRepository = $casoRepo;
    }

    /**
     * Display a listing of the Caso.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->casoRepository->pushCriteria(new RequestCriteria($request));
        $casos = $this->casoRepository->all();

        return view('casos.index')
            ->with('casos', $casos);
    }

    /**
     * Show the form for creating a new Caso.
     *
     * @return Response
     */
    public function create()
    {
        $empresa = Empresa::find(session('empresa_id'));
        $empleados = $empresa->empleados->pluck('nombreCompleto', 'id');
        $materias = Materia::all()->pluck('nombre', 'id');
        $estados = EstadoCaso::all()->pluck('nombre', 'id');
        $cortes = Corte::all()->pluck('nombre', 'id');
        $texto = Materia::jsonMateriasEstados();


        return view('casos.create', ['empleados' => $empleados,
                                            'materias' => $materias,
                                            'estados' => $estados,
                                            'cortes' => $cortes,
                                            'json' => $texto]);
    }

    /**
     * Store a newly created Caso in storage.
     *
     * @param CreateCasoRequest $request
     *
     * @return Response
     */
    public function store(CreateCasoRequest $request)
    {
        $input = $request->all();

        $caso = $this->casoRepository->create($input);

        Flash::success('Caso saved successfully.');

        return redirect(route('casos.index'));
    }

    /**
     * Display the specified Caso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $caso = $this->casoRepository->findWithoutFail($id);

        if (empty($caso)) {
            Flash::error('Caso not found');

            return redirect(route('casos.index'));
        }

        return view('casos.show')->with('caso', $caso);
    }

    /**
     * Show the form for editing the specified Caso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $caso = $this->casoRepository->findWithoutFail($id);

        if (empty($caso)) {
            Flash::error('Caso not found');

            return redirect(route('casos.index'));
        }

        $empresa = Empresa::find(session('empresa_id'));
        $empleados = $empresa->empleados->pluck('nombreCompleto', 'id');
        $materias = Materia::all()->pluck('nombre', 'id');
        $estados = EstadoCaso::all()->pluck('nombre', 'id');
        $cortes = Corte::all()->pluck('nombre', 'id');

        $texto = Materia::jsonMateriasEstados();

        return view('casos.edit')->with(['caso' => $caso,
                                                'empleados' => $empleados,
                                                'materias' => $materias,
                                                'estados' => $estados,
                                                'cortes' => $cortes,
                                                'json' => $texto]);
    }

    /**
     * Update the specified Caso in storage.
     *
     * @param  int              $id
     * @param UpdateCasoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCasoRequest $request)
    {
        $caso = $this->casoRepository->findWithoutFail($id);

        if (empty($caso)) {
            Flash::error('Caso not found');

            return redirect(route('casos.index'));
        }

        $caso = $this->casoRepository->update($request->all(), $id);

        Flash::success('Caso updated successfully.');

        return redirect(route('casos.index'));
    }

    /**
     * Remove the specified Caso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $caso = $this->casoRepository->findWithoutFail($id);

        if (empty($caso)) {
            Flash::error('Caso not found');

            return redirect(route('casos.index'));
        }

        $this->casoRepository->delete($id);

        Flash::success('Caso deleted successfully.');

        return redirect(route('casos.index'));
    }
}
