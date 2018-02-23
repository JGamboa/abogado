<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\SucursalDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSucursalRequest;
use App\Http\Requests\UpdateSucursalRequest;
use App\Repositories\SucursalRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SucursalController extends AppBaseController
{
    /** @var  SucursalRepository */
    private $sucursalRepository;

    public function __construct(SucursalRepository $sucursalRepo)
    {
        $this->sucursalRepository = $sucursalRepo;
    }

    /**
     * Display a listing of the Sucursal.
     *
     * @param SucursalDataTable $sucursalDataTable
     * @return Response
     */
    public function index()
    {
        $sucursales = \App\Models\Sucursal::where('empresa_id', session('empresa_id'));
        $sucursales = $sucursales->paginate(10);
        return view('sucursales.index', ['sucursales' => $sucursales,
            'deletedData'=>'0',
            'btn' => 'btn-danger',
            'text_button'=> 'glyphicon-trash']);
    }

    /**
     * Show the form for creating a new Sucursal.
     *
     * @return Response
     */
    public function create()
    {
        return view('sucursales.create');
    }

    /**
     * Store a newly created Sucursal in storage.
     *
     * @param CreateSucursalRequest $request
     *
     * @return Response
     */
    public function store(CreateSucursalRequest $request)
    {
        $input = $request->all();

        $sucursal = $this->sucursalRepository->create($input);

        Flash::success('Sucursal saved successfully.');

        return redirect(route('sucursales.index'));
    }

    /**
     * Display the specified Sucursal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sucursal = $this->sucursalRepository->findWithoutFail($id);

        if (empty($sucursal)) {
            Flash::error('Sucursal not found');

            return redirect(route('sucursales.index'));
        }

        return view('sucursales.show')->with('sucursal', $sucursal);
    }

    /**
     * Show the form for editing the specified Sucursal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sucursal = $this->sucursalRepository->findWithoutFail($id);

        if (empty($sucursal)) {
            Flash::error('Sucursal not found');

            return redirect(route('sucursales.index'));
        }

        return view('sucursales.edit')->with('sucursal', $sucursal);
    }

    /**
     * Update the specified Sucursal in storage.
     *
     * @param  int              $id
     * @param UpdateSucursalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSucursalRequest $request)
    {
        $sucursal = $this->sucursalRepository->findWithoutFail($id);

        if (empty($sucursal)) {
            Flash::error('Sucursal not found');

            return redirect(route('sucursales.index'));
        }

        $sucursal = $this->sucursalRepository->update($request->all(), $id);

        Flash::success('Sucursal updated successfully.');

        return redirect(route('sucursales.index'));
    }

    /**
     * Remove the specified Sucursal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sucursal = $this->sucursalRepository->findWithoutFail($id);

        if (empty($sucursal)) {
            Flash::error('Sucursal not found');

            return redirect(route('sucursales.index'));
        }

        $this->sucursalRepository->delete($id);

        Flash::success('Sucursal deleted successfully.');

        return redirect(route('sucursales.index'));
    }

    /**
     * Restore a soft deleted Region
     *
     * @return Response
     */
    public function restore($id){
        \App\Models\Sucursal::withTrashed()->find($id)->restore();
        Flash::success('Sucursal restaurada.');

        return redirect(route('sucursales.deleted'));
    }

    /**
     * Display a listing of the deleted Provincia .
     *
     * @return Response
     */
    public function deleted()
    {

        $sucursales = \App\Models\Sucursal::onlyTrashed()->paginate(10);

        return view('sucursales.index', ['sucursales' => $sucursales,
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
            'sucursales.nombre' => $request['name'],
            'deletedData' => $request['deletedData'],
        ];

        if($request['deletedData'] == 1){
            $btn = "btn-success";
            $text_button = "glyphicon-refresh";
        }else{
            $btn = "btn-danger";
            $text_button = "glyphicon-trash";
        }

        $sucursales = $this->doSearchingQuery($constraints);
        return view('sucursales.index', ['sucursales' => $sucursales,
            'searchingVals' => $constraints,
            'deletedData' => $request['deletedData'],
            'btn'=>$btn,
            'text_button'=>$text_button]);
    }

    private function doSearchingQuery($constraints) {
        $query = New \App\Models\Sucursal();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if($fields[$index] != "deletedData"){
                if ($constraint != null) {
                    $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
                }
            }
            if($fields[$index] == "deletedData"){
                $constraint ? $query =  $query->onlyTrashed() : $query ;
            }

            $index++;
        }

        return $query->paginate(10);
    }

}
