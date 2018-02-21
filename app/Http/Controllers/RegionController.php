<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\RegionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Repositories\RegionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RegionController extends AppBaseController
{
    /** @var  RegionRepository */
    private $regionRepository;

    public function __construct(RegionRepository $regionRepo)
    {
        $this->regionRepository = $regionRepo;
    }

    /**
     * Display a listing of the Region.
     *
     * @return Response
     */
    public function index()
    {
        $regiones = \App\Models\Region::paginate(10);

        return view('regiones.index', ['regiones' => $regiones,
            'deletedData'=>'0',
            'btn' => 'btn-danger',
            'text_button'=> 'glyphicon-trash']);
    }

    /**
     * Show the form for creating a new Region.
     *
     * @return Response
     */
    public function create()
    {
        return view('regiones.create');
    }

    /**
     * Store a newly created Region in storage.
     *
     * @param CreateRegionRequest $request
     *
     * @return Response
     */
    public function store(CreateRegionRequest $request)
    {
        $input = $request->all();

        $region = $this->regionRepository->create($input);

        Flash::success('Region saved successfully.');

        return redirect(route('regiones.index'));
    }

    /**
     * Display the specified Region.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $region = $this->regionRepository->findWithoutFail($id);

        if (empty($region)) {
            Flash::error('Region not found');

            return redirect(route('regiones.index'));
        }

        return view('regiones.show')->with('region', $region);
    }

    /**
     * Show the form for editing the specified Region.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $region = $this->regionRepository->findWithoutFail($id);

        if (empty($region)) {
            Flash::error('Region not found');

            return redirect(route('regiones.index'));
        }

        return view('regiones.edit')->with('region', $region);
    }

    /**
     * Update the specified Region in storage.
     *
     * @param  int              $id
     * @param UpdateRegionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRegionRequest $request)
    {
        $region = $this->regionRepository->findWithoutFail($id);

        if (empty($region)) {
            Flash::error('Region not found');

            return redirect(route('regiones.index'));
        }

        $region = $this->regionRepository->update($request->all(), $id);

        Flash::success('Region updated successfully.');

        return redirect(route('regiones.index'));
    }

    /**
     * Remove the specified Region from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $region = $this->regionRepository->findWithoutFail($id);

        if (empty($region)) {
            Flash::error('Region not found');

            return redirect(route('regiones.index'));
        }

        $this->regionRepository->delete($id);

        Flash::success('Region deleted successfully.');

        return redirect(route('regiones.index'));
    }

    /**
     * Restore a soft deleted Region
     *
     * @return Response
     */
    public function restore($id){
        \App\Models\Region::withTrashed()->find($id)->restore();
        Flash::success('Región restaurada.');

        return redirect(route('regiones.deleted'));
    }

    /**
     * Display a listing of the deleted Provincia .
     *
     * @return Response
     */
    public function deleted()
    {

        $regiones = \App\Models\Region::onlyTrashed()->paginate(10);

        return view('regiones.index', ['regiones' => $regiones,
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
            'regiones.nombre' => $request['name'],
            'deletedData' => $request['deletedData'],
        ];

        if($request['deletedData'] == 1){
            $btn = "btn-success";
            $text_button = "glyphicon-refresh";
        }else{
            $btn = "btn-danger";
            $text_button = "glyphicon-trash";
        }

        $regiones = $this->doSearchingQuery($constraints);
        return view('regiones.index', ['regiones' => $regiones,
            'searchingVals' => $constraints,
            'deletedData' => $request['deletedData'],
            'btn'=>$btn,
            'text_button'=>$text_button]);
    }

    private function doSearchingQuery($constraints) {
        $query = New \App\Models\Region;
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
