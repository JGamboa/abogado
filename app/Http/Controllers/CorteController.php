<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCorteRequest;
use App\Http\Requests\UpdateCorteRequest;
use App\Repositories\CorteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CorteController extends AppBaseController
{
    /** @var  CorteRepository */
    private $corteRepository;

    public function __construct(CorteRepository $corteRepo)
    {
        $this->corteRepository = $corteRepo;
    }

    /**
     * Display a listing of the Corte.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->corteRepository->pushCriteria(new RequestCriteria($request));
        $cortes = $this->corteRepository->all();

        return view('cortes.index')
            ->with('cortes', $cortes);
    }

    /**
     * Show the form for creating a new Corte.
     *
     * @return Response
     */
    public function create()
    {
        return view('cortes.create');
    }

    /**
     * Store a newly created Corte in storage.
     *
     * @param CreateCorteRequest $request
     *
     * @return Response
     */
    public function store(CreateCorteRequest $request)
    {
        $input = $request->all();

        $corte = $this->corteRepository->create($input);

        Flash::success('Corte saved successfully.');

        return redirect(route('cortes.index'));
    }

    /**
     * Display the specified Corte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $corte = $this->corteRepository->findWithoutFail($id);

        if (empty($corte)) {
            Flash::error('Corte not found');

            return redirect(route('cortes.index'));
        }

        return view('cortes.show')->with('corte', $corte);
    }

    /**
     * Show the form for editing the specified Corte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $corte = $this->corteRepository->findWithoutFail($id);

        if (empty($corte)) {
            Flash::error('Corte not found');

            return redirect(route('cortes.index'));
        }

        return view('cortes.edit')->with('corte', $corte);
    }

    /**
     * Update the specified Corte in storage.
     *
     * @param  int              $id
     * @param UpdateCorteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCorteRequest $request)
    {
        $corte = $this->corteRepository->findWithoutFail($id);

        if (empty($corte)) {
            Flash::error('Corte not found');

            return redirect(route('cortes.index'));
        }

        $corte = $this->corteRepository->update($request->all(), $id);

        Flash::success('Corte updated successfully.');

        return redirect(route('cortes.index'));
    }

    /**
     * Remove the specified Corte from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $corte = $this->corteRepository->findWithoutFail($id);

        if (empty($corte)) {
            Flash::error('Corte not found');

            return redirect(route('cortes.index'));
        }

        $this->corteRepository->delete($id);

        Flash::success('Corte deleted successfully.');

        return redirect(route('cortes.index'));
    }
}
