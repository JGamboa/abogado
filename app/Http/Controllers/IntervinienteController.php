<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIntervinienteRequest;
use App\Http\Requests\UpdateIntervinienteRequest;
use App\Imports\IntervinienteImport;
use App\Repositories\IntervinienteRepository;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Validation\ValidationException;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Region as Region;
use App\Models\Isapre as Isapre;
use Gate;
use Maatwebsite\Excel\Facades\Excel;

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
        if(Gate::denies('ver intervinientes')){
            abort(403);
        }

        $this->intervinienteRepository->pushCriteria(new RequestCriteria($request));
        $intervinientes = $this->intervinienteRepository->paginate(10);

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

        $regiones = Region::pluck('nombre', 'id')->all();
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

        $input['rut'] = str_replace(".", "", $input['rut']);

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


    /**
     * Search interviniente from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $fields = [
            'rut',
            'nombres',
            'apellido_paterno',
            'apellido_materno',
        ];


        $intervinientes = $this->doSearchingQuery($fields, $request->q);

        $items = [];
        foreach($intervinientes as $interviniente){
            $interviniente->isapre;
            $interviniente->region;
            $interviniente->comuna;
            $interviniente->provincia;
            $items[] = $interviniente;
        }

        return Response::json($items);
    }


    private function doSearchingQuery($fields, $term) {
        $query = New \App\Models\Interviniente;
        foreach ($fields as $field) {
            $query = $query->orWhere( $field, 'like', '%'.$term.'%');
        }

        return $query->paginate(10);
    }


    /**
     * Display the specified Interviniente.
     * GET|HEAD /interviniente/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function showJson(Request $request)
    {
        /** @var Interviniente $interviniente */
        $interviniente = $this->intervinienteRepository->findWithoutFail($request->q);

        if (empty($interviniente)) {
            return $this->sendError('Interviniente no encontrado');
        }

        $interviniente->isapre;
        $interviniente->region;
        $interviniente->comuna;
        $interviniente->provincia;

        return $this->sendResponse($interviniente->toArray(), 'Interviniente retrieved successfully');
    }

    /**
     * Store a newly created Interviniente in storage.
     * POST /storeAjax
     *
     * @param CreateIntervinienteRequest $request
     *
     * @return Response
     */
    public function storeAjax(CreateIntervinienteRequest $request)
    {
        $input = $request->all();

        $input['rut'] = str_replace(".", "", $input['rut']);

        $interviniente = $this->intervinienteRepository->create($input);

        return $this->sendResponse($interviniente->toArray(), 'Interviente creado exitosamente');
    }

    public function importarForm()
    {
        return view('intervinientes.importar');
    }

    public function importar(Request $request)
    {
        try {
             Excel::import(new IntervinienteImport, $request->file('excel'));
             return back();
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            dd($failures);
            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
            }
        } catch (ValidationException $e){
            dd($e);
        }
    }
}
