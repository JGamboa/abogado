<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSucursalAPIRequest;
use App\Http\Requests\API\UpdateSucursalAPIRequest;
use App\Models\Sucursal;
use App\Repositories\SucursalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SucursalController
 * @package App\Http\Controllers\API
 */

class SucursalAPIController extends AppBaseController
{
    /** @var  SucursalRepository */
    private $sucursalRepository;

    public function __construct(SucursalRepository $sucursalRepo)
    {
        $this->sucursalRepository = $sucursalRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/sucursales",
     *      summary="Get a listing of the Sucursales.",
     *      tags={"Sucursal"},
     *      description="Get all Sucursales",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Sucursal")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->sucursalRepository->pushCriteria(new RequestCriteria($request));
        $this->sucursalRepository->pushCriteria(new LimitOffsetCriteria($request));
        $sucursales = $this->sucursalRepository->all();

        return $this->sendResponse($sucursales->toArray(), 'Sucursales retrieved successfully');
    }

    /**
     * @param CreateSucursalAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sucursales",
     *      summary="Store a newly created Sucursal in storage",
     *      tags={"Sucursal"},
     *      description="Store Sucursal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Sucursal that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Sucursal")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Sucursal"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSucursalAPIRequest $request)
    {
        $input = $request->all();

        $sucursales = $this->sucursalRepository->create($input);

        return $this->sendResponse($sucursales->toArray(), 'Sucursal saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sucursales/{id}",
     *      summary="Display the specified Sucursal",
     *      tags={"Sucursal"},
     *      description="Get Sucursal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sucursal",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Sucursal"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Sucursal $sucursal */
        $sucursal = $this->sucursalRepository->findWithoutFail($id);

        if (empty($sucursal)) {
            return $this->sendError('Sucursal not found');
        }

        return $this->sendResponse($sucursal->toArray(), 'Sucursal retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSucursalAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sucursales/{id}",
     *      summary="Update the specified Sucursal in storage",
     *      tags={"Sucursal"},
     *      description="Update Sucursal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sucursal",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Sucursal that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Sucursal")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Sucursal"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSucursalAPIRequest $request)
    {
        $input = $request->all();

        /** @var Sucursal $sucursal */
        $sucursal = $this->sucursalRepository->findWithoutFail($id);

        if (empty($sucursal)) {
            return $this->sendError('Sucursal not found');
        }

        $sucursal = $this->sucursalRepository->update($input, $id);

        return $this->sendResponse($sucursal->toArray(), 'Sucursal updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sucursales/{id}",
     *      summary="Remove the specified Sucursal from storage",
     *      tags={"Sucursal"},
     *      description="Delete Sucursal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sucursal",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Sucursal $sucursal */
        $sucursal = $this->sucursalRepository->findWithoutFail($id);

        if (empty($sucursal)) {
            return $this->sendError('Sucursal not found');
        }

        $sucursal->delete();

        return $this->sendResponse($id, 'Sucursal deleted successfully');
    }
}
