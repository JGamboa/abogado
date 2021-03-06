<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCasoRequest;
use App\Http\Requests\UpdateCasoRequest;
use App\Notifications\CaptadorCasoAsignado;
use App\Notifications\ResponsableCasoAsignado;
use App\Repositories\CasoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Empresa;
use App\Models\Materia;
use App\Models\EstadoCaso;
use App\Models\Corte;
use App\Models\Interviniente;
use App\Models\Caso;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Provincia;
use App\Models\Isapre;
use Illuminate\Support\Facades\Input;
use File;
use Carbon\Carbon;
use App\Models\Upload;

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

        //$this->casoRepository->pushCriteria(new RequestCriteria($request));
        $estados = EstadoCaso::all();
        $cortes = Corte::all()->pluck('nombre', 'id');
        $casos = Caso::buscar($request)->paginate(10);

        return view('casos.index')
            ->with(['casos'=> $casos,
                    'estados' => $estados,
                    'cortes' => $cortes]);
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

        $regiones = Region::pluck('nombre', 'id')->all();
        $provincias = Provincia::pluck('nombre', 'id')->all();
        $comunas = Comuna::pluck('nombre', 'id')->all();
        $isapres =  Isapre::pluck('nombre', 'id')->all();


        return view('casos.create', ['empleados' => $empleados,
                                            'materias' => $materias,
                                            'estados' => $estados,
                                            'cortes' => $cortes,
                                            'json' => $texto,
                                            'regiones'=>$regiones,
                                            'comunas'=>$comunas,
                                            'provincias' =>$provincias,
                                            'isapres'=>$isapres]);
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
        /* @var $caso Caso */
        $input = $request->all();

        if(Auth::user()->hasRole('CAPTADOR')){
            $input['captador'] = Auth::user()->empleado->id;
            $input['fecha_captacion'] =  Carbon::now();;
        }

        $cliente = Interviniente::find($request->cliente_id);
        $cliente->isapre;
        $cliente->region;
        $cliente->comuna;
        $cliente->provincia;
        $input['cliente'] = $cliente;

        $contraparte = Interviniente::find($request->contraparte_id);
        $contraparte->isapre;
        $contraparte->region;
        $contraparte->comuna;
        $contraparte->provincia;
        $input['contraparte'] = $contraparte;

        $caso = $this->casoRepository->create($input);

        if(isset($caso->datosResponsable->user)){
            $caso->datosResponsable->user->notify(new ResponsableCasoAsignado($caso));
        }

        if(isset($caso->datosCaptador->user)){
            $caso->datosCaptador->user->notify(new CaptadorCasoAsignado($caso));
        }

        Flash::success('Caso guardado exitosamente.');

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

        $this->authorize('update', $caso);

        $caso_updated = $this->casoRepository->update($request->all(), $id);

        if ($caso->responsable_proceso != $request->input('responsable_proceso') && $request->filled('responsable_proceso')){
            $caso_updated->datosResponsable->user->notify(new ResponsableCasoAsignado($caso));
        }

        if ($caso->captador != $request->input('captador') && $request->filled('captador')){
            $caso_updated->datosCaptador->user->notify(new CaptadorCasoAsignado($caso));
        }

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


    /**
     * Upload fiels via DropZone.js
     *
     * @return \Illuminate\Http\Response
     */
    public function upload_files() {

        $input = Input::all();

        $caso = $this->casoRepository->findWithoutFail($input['caso_id']);

        if(!Auth::user()->can('update',$caso)){
            return $this->sendError('No tiene permiso para subir archivos');
        }

        if(Input::hasFile('file')) {

            $file = Input::file('file');

            $folder = storage_path('uploads');
            $filename = $file->getClientOriginalName();

            $date_append = date("Y-m-d-His-");
            $upload_success = Input::file('file')->move($folder, $date_append.$filename);

            if( $upload_success ) {

                $public = Input::get('public');
                if(isset($public)) {
                    $public = true;
                } else {
                    $public = false;
                }

                $upload = Upload::create([
                    "name" => $filename,
                    "path" => $date_append.$filename,
                    "extension" => pathinfo($filename, PATHINFO_EXTENSION),
                    "caption" => "",
                    "hash" => "",
                    "isPublic" => $public,
                    "user_id" => Auth::id(),
                ]);
                // apply unique random hash to file
                while(true) {
                    $hash = strtolower(str_random(20));
                    if(!Upload::where("hash", $hash)->count()) {
                        $upload->hash = $hash;
                        break;
                    }
                }
                $upload->save();

                \DB::table('casos_uploads')->insert([
                    'caso_id' => $input['caso_id'],
                    'upload_id' => $upload->id,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                return response()->json([
                    "status" => "success",
                    "upload" => $upload
                ], 200);
            } else {
                return response()->json([
                    "status" => "error"
                ], 400);
            }
        } else {
            return response()->json('error: upload file not found.', 400);
        }
    }

    /**
     * Get all files from uploads folder
     *
     * @return \Illuminate\Http\Response
     */
    public function uploaded_files($caso_id)
    {
        $caso = Caso::find($caso_id);

        $uploads = $caso->uploads;

        $uploads2 = array();
        foreach ($uploads as $upload) {
            $empleado = $upload->empleado();
            $u = (object) array();
            $u->id = $upload->id;
            $u->name = $upload->name;
            $u->extension = $upload->extension;
            $u->hash = $upload->hash;
            $u->public = $upload->public;
            $u->caption = $upload->caption;
            $u->user = $empleado !== null ? $empleado->nombres : isset($upload->user) ? $upload->user->name : '';

            $uploads2[] = $u;
        }

        // $folder = storage_path('/uploads');
        // $files = array();
        // if(file_exists($folder)) {
        //     $filesArr = File::allFiles($folder);
        //     foreach ($filesArr as $file) {
        //         $files[] = $file->getfilename();
        //     }
        // }
        // return response()->json(['files' => $files]);
        return response()->json(['uploads' => $uploads2]);
    }

    public function editInLine(Request $request){
        $input = json_decode($request->getContent());

        $caso = $this->casoRepository->findWithoutFail($input->pk);

        if (empty($caso)) {

            return response()->json([
                "status" => "Not Found"
            ], 400);
        }

        $this->authorize('update', $caso);

        $caso = $this->casoRepository->update([$input->name => $input->value], $input->pk);

        return response()->json([
            "success" => true,
        ], 200);
    }


    /**
     * Search city from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {

        $rut = $request['rut'];
        $rut = str_replace(".", "", $rut);

        $constraints = [
            'casos.contraparte->nombres' => $request['nombres'],
            'casos.contraparte->rut' => $rut,
            'casos.contraparte->apellido_paterno' => $request['apellidopaterno'],
            'casos.contraparte->apellido_materno' => $request['apellidomaterno'],
            'casos.cliente->nombres' => $request['nombres'],
            'casos.cliente->rut' => $rut,
            'casos.cliente->apellido_paterno' => $request['apellidopaterno'],
            'casos.cliente->apellido_materno' => $request['apellidomaterno'],
        ];

        $estados = EstadoCaso::all();
        $cortes = Corte::all();

        $casos = $this->doSearchingQuery($constraints);

        return view('casos.index', [
            'casos' => $casos,
            'estados' => $estados,
            'cortes' => $cortes,
            'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $casos = New \App\Models\Caso;

        /*$query = $query->where([
            ['casos.contraparte->nombres', 'like', $constraints['casos.contraparte->nombres']],
            ['casos.contraparte->apellido_paterno', 'like', $constraints['casos.contraparte->apellido_paterno']],
            ['casos.contraparte->apellido_materno', 'like', $constraints['casos.contraparte->apellido_materno']]
            ])
        ->orWhere([
            ['casos.cliente->nombres', 'like', $constraints['casos.contraparte->nombres']],
            ['casos.cliente->apellido_paterno', 'like', $constraints['casos.contraparte->apellido_paterno']],
            ['casos.cliente->apellido_materno', 'like', $constraints['casos.contraparte->apellido_materno']]
        ]);
        dd($query->toSql());*/

        $fields = array_keys($constraints);
        $index = 0;

        foreach ($constraints as $constraint) {

            if ($constraint != null) {
                if($index <= 2){
                    $array_contraparte[] = [$fields[$index], 'like', '%'.$constraint.'%'];
                }else{
                    $array_cliente[] = [$fields[$index], 'like', '%'.$constraint.'%'];
                }
            }

            $index++;
        }

        $casos = $casos->where($array_contraparte)->orWhere($array_cliente);

        return $casos->paginate(10);
    }

    public function reporte(Request $request){

        $empresa = Empresa::find(session('empresa_id'));
        $empleados = $empresa->empleados->pluck('nombreCompleto', 'id');
        $cortes = Corte::all()->pluck('nombre', 'id');

        $casos = Caso::buscar($request)->get();

        if($request->filled('exportar')){
            if($request->exportar == "excel"){
                Caso::exportarExcel($casos);
            }
        }

        return view('casos.reporte')->with(['casos'=>$casos, 'cortes'=>$cortes, 'empleados'=>$empleados]);

    }

    public function delete_file()
    {
        $file_id = Input::get('file_id');

        $upload = Upload::find($file_id);
        if(isset($upload->id)) {
            // Update Caption
            $upload->delete();

            return response()->json([
                'status' => "success"
            ]);
        } else {
            return response()->json([
                'status' => "failure",
                'message' => "Upload not found"
            ]);
        }
    }
}
