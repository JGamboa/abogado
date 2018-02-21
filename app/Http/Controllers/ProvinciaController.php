<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\DataTables\ProvinciaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProvinciaRequest;
use App\Http\Requests\UpdateProvinciaRequest;
use App\Repositories\ProvinciaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Comuna;
use App\Models\Provincia;

class ProvinciaController extends AppBaseController
{
    /** @var  ProvinciaRepository */
    private $provinciaRepository;

    public function __construct(ProvinciaRepository $ciudadRepo)
    {
        $this->provinciaRepository = $ciudadRepo;
    }

    /**
     * Display a listing of the Provincia.
     *
     * @return Response
     */
    public function index()
    {
         $ciudades = \DB::table('provincias')
            ->leftJoin('regiones', 'provincias.regiones_id', '=', 'regiones.id')
            ->select('provincias.id', 'provincias.nombre', 'regiones.nombre as nombre_region', 'regiones.id as region_id')
            ->whereNull('provincias.deleted_at')
            ->paginate(20);

        return view('provincias.index', ['provincias' => $ciudades,
                                             'deletedData'=>'0',
                                             'btn' => 'btn-danger',
                                             'text_button'=> 'glyphicon-trash']);
    }

    /**
     * Show the form for creating a new Provincia.
     *
     * @return Response
     */
    public function create()
    {
        $regiones = \DB::table('regiones')->whereNull('deleted_at')->pluck('nombre', 'id');
        return view('provincias.create')->with('regiones', $regiones);
    }

    /**
     * Store a newly created Provincia in storage.
     *
     * @param CreateProvinciaRequest $request
     *
     * @return Response
     */
    public function store(CreateProvinciaRequest $request)
    {
        $input = $request->all();

        $ciudad = $this->provinciaRepository->create($input);

        Flash::success('Provincia saved successfully.');

        return redirect(route('provincias.index'));
    }

    /**
     * Display the specified Provincia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ciudad = $this->provinciaRepository->findWithoutFail($id);

        if (empty($ciudad)) {
            Flash::error('Provincia not found');

            return redirect(route('provincias.index'));
        }

        return view('provincias.show')->with('provincia', $ciudad);
    }

    /**
     * Show the form for editing the specified Provincia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $provincia = $this->provinciaRepository->findWithoutFail($id);


        if (empty($provincia)) {
            Flash::error('Provincia not found');

            return redirect(route('provincias.index'));
        }

        $regiones = Region::all();
        return view('provincias.edit')->with(['provincia' => $provincia, 'regiones' => $regiones]);
    }

    /**
     * Update the specified Provincia in storage.
     *
     * @param  int              $id
     * @param UpdateProvinciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProvinciaRequest $request)
    {
        $ciudad = $this->provinciaRepository->findWithoutFail($id);

        if (empty($ciudad)) {
            Flash::error('Provincia not found');

            return redirect(route('provincias.index'));
        }

        $ciudad = $this->provinciaRepository->update($request->all(), $id);

        Flash::success('Provincia updated successfully.');

        return redirect(route('provincias.index'));
    }

    /**
     * Remove the specified Provincia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ciudad = $this->provinciaRepository->findWithoutFail($id);

        if (empty($ciudad)) {
            Flash::error('Provincia not found');

            return redirect(route('provincias.index'));
        }

        $this->provinciaRepository->delete($id);

        Flash::success('Provincia deleted successfully.');

        return redirect(route('provincias.index'));
    }


    /**
     * Restore a soft deleted Provincia
     *
     * @return Response
     */
    public function restore($id){
        Provincia::withTrashed()->find($id)->restore();
        Flash::success('Provincia restaurada.');

        return redirect(route('provincias.deleted'));
    }

    /**
     * Display a listing of the deleted Provincia .
     *
     * @return Response
     */
    public function deleted()
    {

        $ciudades = \DB::table('provincias')
            ->leftJoin('regiones', 'provincias.regiones_id', '=', 'regiones.id')
            ->select('provincias.id', 'provincias.nombre', 'regiones.nombre as nombre_region', 'regiones.id as region_id')
            ->whereNotNull('provincias.deleted_at')
            ->paginate(20);

        return view('provincias.index', ['provincias' => $ciudades,
            'deletedData'=>'1',
            'btn' => 'btn-success',
            'text_button' => 'glyphicon-refresh']);
    }


    /**
     * Search city from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'provincias.nombre' => $request['name'],
            'deletedData' => $request['deletedData'],
        ];

        if($request['deletedData'] == 1){
            $btn = "btn-success";
            $text_button = "glyphicon-refresh";
        }else{
            $btn = "btn-danger";
            $text_button = "glyphicon-trash";
        }

        $ciudades = $this->doSearchingQuery($constraints);
        return view('provincias.index', ['provincias' => $ciudades,
                                             'searchingVals' => $constraints,
                                             'deletedData' => $request['deletedData'],
                                             'btn'=>$btn,
                                             'text_button'=>$text_button]);
    }

    private function doSearchingQuery($constraints) {
        $query = \DB::table('provincias');
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if($fields[$index] != "deletedData"){
                if ($constraint != null) {
                    $query = $query
                        ->where( $fields[$index], 'like', '%'.$constraint.'%');
                }
            }
            if($fields[$index] == "deletedData"){
                $constraint ? $query =  $query->whereNotNull('provincias.deleted_at') : $query = $query->whereNull('provincias.deleted_at');

            }

            $index++;
        }


        $query = $query
            ->leftJoin('regiones', 'provincias.regiones_id', '=', 'regiones.id')
            ->select('provincias.id', 'provincias.nombre', 'regiones.nombre as nombre_region', 'regiones.id as region_id');

        return $query->paginate(20);
    }

    private function validateInput($request) {
        $this->validate($request, [
            'name' => 'required|max:60|unique:ciudad'
        ]);
    }

}
