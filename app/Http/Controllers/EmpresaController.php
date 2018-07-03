<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\EmpresaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use App\Models\Comuna;
use App\Repositories\EmpresaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Provincia;
use App\Models\Sucursal;
use App\Models\Empleado as Empleado;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends AppBaseController
{
    /** @var  EmpresaRepository */
    private $empresaRepository;

    public function __construct(EmpresaRepository $empresaRepo)
    {
        $this->empresaRepository = $empresaRepo;
    }

    /**
     * Display a listing of the Empresa.
     *
     * @param EmpresaDataTable $empresaDataTable
     * @return Response
     */
    public function index()
    {
        $empresas = Empleado::misEmpresas(1);

        return view('empresas.index', ['empresas' => $empresas,
            'deletedData'=>'0',
            'btn' => 'btn-danger',
            'text_button'=> 'glyphicon-trash']);
    }

    /**
     * Show the form for creating a new Empresa.
     *
     * @return Response
     */
    public function create()
    {
        $regiones = \DB::table('regiones')->whereNull('deleted_at')->pluck('nombre', 'id')->all();
        return view('empresas.create', ['regiones'=>$regiones]);
    }

    /**
     * Store a newly created Empresa in storage.
     *
     * @param CreateEmpresaRequest $request
     *
     * @return Response
     */
    public function store(CreateEmpresaRequest $request)
    {
        $input = $request->all();

        $empresa = $this->empresaRepository->create($input);

        $empresa->sucursales()->create([
            'provincias_id' => $empresa->provincias_id,
            'comunas_id' => $empresa->comunas_id,
            'nombre' => 'Casa Matriz',
            'direccion' => $empresa->direccion,
            'tipo' => 1,
        ]);

        $role = Role::create(['name' => 'SECRETARIA', 'empresa_id' => $empresa->id]);
        $role = Role::create(['name' => 'CAPTADOR', 'empresa_id' => $empresa->id]);

        Flash::success('Empresa saved successfully.');

        return redirect(route('empresas.index'));
    }

    /**
     * Display the specified Sucursales of Empresa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function showSucursales($id)
    {
        $empresa = $this->empresaRepository->findWithoutFail($id);

        if (empty($empresa)) {
            Flash::error('Empresa not found');

            return redirect(route('empresas.index'));
        }

        return view('empresas.sucursales', ['sucursales' => $empresa->sucursales,
            'deletedData'=>'0',
            'btn' => 'btn-danger',
            'text_button'=> 'glyphicon-trash']);
    }

    /**
     * Display the specified Empresa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empresa = $this->empresaRepository->findWithoutFail($id);

        if (empty($empresa)) {
            Flash::error('Empresa not found');

            return redirect(route('empresas.index'));
        }

        return view('empresas.show')->with('empresa', $empresa);
    }

    /**
     * Show the form for editing the specified Empresa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empresa = $this->empresaRepository->findWithoutFail($id);

        if (empty($empresa)) {
            Flash::error('Empresa not found');

            return redirect(route('empresas.index'));
        }

        $regiones = \App\Models\Region::all();
        $provincias = \App\Models\Provincia::all();
        $comunas = \App\Models\Comuna::all();
        return view('empresas.edit')->with(['regiones'=>$regiones,
                                                    'empresa'=>$empresa,
                                                    'comunas'=>$comunas,
                                                    'provincias' =>$provincias]);
    }

    /**
     * Update the specified Empresa in storage.
     *
     * @param  int              $id
     * @param UpdateEmpresaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmpresaRequest $request)
    {
        $empresa = $this->empresaRepository->findWithoutFail($id);

        if (empty($empresa)) {
            Flash::error('Empresa not found');

            return redirect(route('empresas.index'));
        }

        $empresa = $this->empresaRepository->update($request->all(), $id);

        Flash::success('Empresa updated successfully.');

        return redirect(route('empresas.index'));
    }

    /**
     * Remove the specified Empresa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empresa = $this->empresaRepository->findWithoutFail($id);

        if (empty($empresa)) {
            Flash::error('Empresa not found');

            return redirect(route('empresas.index'));
        }

        $this->empresaRepository->delete($id);

        Flash::success('Empresa deleted successfully.');

        return redirect(route('empresas.index'));
    }

    /**
     * Restore a soft deleted Region
     *
     * @return Response
     */
    public function restore($id){
        \App\Models\Empresa::withTrashed()->find($id)->restore();
        Flash::success('Empresa restaurada.');

        return redirect(route('empresas.deleted'));
    }

    /**
     * Display a listing of the deleted Provincia .
     *
     * @return Response
     */
    public function deleted()
    {

        $empresas = \App\Models\Empresa::onlyTrashed()->paginate(20);

        return view('empresas.index', ['empresas' => $empresas,
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
            'empresas.razon_social' => $request['name'],
            'deletedData' => $request['deletedData'],
        ];

        if($request['deletedData'] == 1){
            $btn = "btn-success";
            $text_button = "glyphicon-refresh";
        }else{
            $btn = "btn-danger";
            $text_button = "glyphicon-trash";
        }

        $empresas = $this->doSearchingQuery($constraints);
        return view('empresas.index', ['empresas' => $empresas,
            'searchingVals' => $constraints,
            'deletedData' => $request['deletedData'],
            'btn'=>$btn,
            'text_button'=>$text_button]);
    }

    private function doSearchingQuery($constraints) {
        $query = New \App\Models\Empresa;
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if($fields[$index] != "deletedData"){
                if ($constraint != null) {
                    $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
                }
            }
            if($fields[$index] == "deletedData"){
                $constraint ? $query =  $query->onlyTrashed() : $query;
            }

            $index++;
        }

        return $query->paginate(10);
    }

    public function seleccionar(){

        $empresas = Empleado::misEmpresas();

        $booleanResult = \Auth::user()->isSuperAdmin();

        if(count($empresas) == 1){
            $empresa = \App\Models\Empresa::find($empresas[0]->id);
            Auth::user()->asignarEmpresa($empresa);
            Flash::success('Empresa seleccionada. '. $empresa->razon_social);

            if(Auth::user()->hasRole('CAPTADOR')){
                return redirect(route('casos.create'));
            }else{
                return redirect(route('home'));
            }

        }

        $empresas = $empresas->pluck('razon_social','id');

        return view('empresas.seleccionar', ['empresas' => $empresas]);
    }

    public function session(Request $request){

        $empresa = \App\Models\Empresa::find($request->id);
        \Auth::user()->asignarEmpresa($empresa);
        Flash::success('Empresa seleccionada. '. $empresa->razon_social);
        return redirect(route('empresas.index'));
    }

}
