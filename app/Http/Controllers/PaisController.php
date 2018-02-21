<?php

namespace App\Http\Controllers;

use App\DataTables\PaisDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePaisRequest;
use App\Http\Requests\UpdatePaisRequest;
use App\Repositories\PaisRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PaisController extends AppBaseController
{
    /** @var  PaisRepository */
    private $paisRepository;

    public function __construct(PaisRepository $paisRepo)
    {
        $this->paisRepository = $paisRepo;
    }

    /**
     * Display a listing of the Pais.
     *
     * @param PaisDataTable $paisDataTable
     * @return Response
     */
    public function index(PaisDataTable $paisDataTable)
    {
        return $paisDataTable->render('pais.index');
    }

    /**
     * Show the form for creating a new Pais.
     *
     * @return Response
     */
    public function create()
    {
        return view('pais.create');
    }

    /**
     * Store a newly created Pais in storage.
     *
     * @param CreatePaisRequest $request
     *
     * @return Response
     */
    public function store(CreatePaisRequest $request)
    {
        $input = $request->all();

        $pais = $this->paisRepository->create($input);

        Flash::success('Pais saved successfully.');

        return redirect(route('pais.index'));
    }

    /**
     * Display the specified Pais.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pais = $this->paisRepository->findWithoutFail($id);

        if (empty($pais)) {
            Flash::error('Pais not found');

            return redirect(route('pais.index'));
        }

        return view('pais.show')->with('pais', $pais);
    }

    /**
     * Show the form for editing the specified Pais.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pais = $this->paisRepository->findWithoutFail($id);

        if (empty($pais)) {
            Flash::error('Pais not found');

            return redirect(route('pais.index'));
        }

        return view('pais.edit')->with('pais', $pais);
    }

    /**
     * Update the specified Pais in storage.
     *
     * @param  int              $id
     * @param UpdatePaisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaisRequest $request)
    {
        $pais = $this->paisRepository->findWithoutFail($id);

        if (empty($pais)) {
            Flash::error('Pais not found');

            return redirect(route('pais.index'));
        }

        $pais = $this->paisRepository->update($request->all(), $id);

        Flash::success('Pais updated successfully.');

        return redirect(route('pais.index'));
    }

    /**
     * Remove the specified Pais from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pais = $this->paisRepository->findWithoutFail($id);

        if (empty($pais)) {
            Flash::error('Pais not found');

            return redirect(route('pais.index'));
        }

        $this->paisRepository->delete($id);

        Flash::success('Pais deleted successfully.');

        return redirect(route('pais.index'));
    }
}
