<?php

namespace App\Http\Controllers\API;

use App\Models\ObservacionCaso;
use App\Repositories\ObservacionCasoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ObservacionCasoAPIController
 * @package App\Http\Controllers\API
 */

class ObservacionCasoAPIController extends AppBaseController
{
    /** @var  ObservacionCasoRepository */
    private $observacionCasoRepository;

    public function __construct(ObservacionCasoRepository $observacionCasoRepo)
    {
        $this->observacionCasoRepository = $observacionCasoRepo;
    }

    /**
     * Display a listing of the Empresa.
     * GET|HEAD /observacionesCasos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->observacionCasoRepository->pushCriteria(new RequestCriteria($request));
        $this->observacionCasoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $observaciones = $this->observacionCasoRepository->all();

        return $this->sendResponse($observaciones->toArray(), 'Observaciones retrieved successfully');
    }

    /**
     * Store a newly created ObservacionCaso in storage.
     * POST /observacionesCasos
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $observaciones = $this->observacionCasoRepository->create($input);

        return $this->sendResponse($observaciones->toArray(), 'Observacion guardada exitosamente');
    }

    /**
     * Display the specified Observacion.
     * GET|HEAD /observacionesCasos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ObservacionCaso $observaciones */
        $observaciones = $this->observacionCasoRepository->findWithoutFail($id);

        if (empty($observaciones)) {
            return $this->sendError('Observacion not found');
        }


        return $this->sendResponse($observaciones->toArray(), 'Observacion retrieved successfully');
    }

    /**
     * Update the specified Observacion in storage.
     * PUT/PATCH /observacionesCasos/{id}
     *
     * @param  int $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var ObservacionCaso $empresa */
        $observacion = $this->observacionCasoRepository->findWithoutFail($id);

        if (empty($observacion)) {
            return $this->sendError('Observacion not found');
        }

        $observacion = $this->observacionCasoRepository->update($input, $id);

        return $this->sendResponse($observacion->toArray(), 'Observacion updated successfully');
    }

    /**
     * Remove the specified Observacion from storage.
     * DELETE /observacionesCasos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ObservacionCaso $observacion */
        $observacion = $this->observacionCasoRepository->findWithoutFail($id);

        if (empty($observacion)) {
            return $this->sendError('Observacion not found');
        }

        $observacion->delete();

        return $this->sendResponse($id, 'Observacion deleted successfully');
    }
}
