<?php

namespace App\Http\Controllers\API;

use App\Repositories\ProvinciaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProvinciaController
 * @package App\Http\Controllers\API
 */

class ProvinciaAPIController extends AppBaseController
{
    /** @var  ProvinciaRepository */
    private $provinciaRepository;

    public function __construct(ProvinciaRepository $provinciaRepo)
    {
        $this->provinciaRepository = $provinciaRepo;
    }

    /**
     * Display a listing of the Provincia.
     * GET|HEAD /provincias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->provinciaRepository->pushCriteria(new RequestCriteria($request));
        $this->provinciaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $provincias = $this->provinciaRepository->all();

        return $this->sendResponse($provincias->toArray(), 'Ciudades retrieved successfully');
    }

    public function loadComunas($provincia_id) {
        $comunas = \App\Models\Comuna::where('provincia_id', '=', $provincia_id)->get(['id', 'nombre']);
        return response()->json($comunas);
    }

    public function loadProvincias($region_id){
        $regiones = \App\Models\Provincia::where('region_id', '=', $region_id)->get(['id', 'nombre']);
        return response()->json($regiones);
    }
}
