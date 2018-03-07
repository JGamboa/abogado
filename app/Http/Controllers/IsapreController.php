<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIsapreRequest;
use App\Http\Requests\UpdateIsapreRequest;
use App\Repositories\IsapreRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class IsapreController extends AppBaseController
{
    /** @var  IsapreRepository */
    private $isapreRepository;

    public function __construct(IsapreRepository $isapreRepo)
    {
        $this->isapreRepository = $isapreRepo;
    }

    /**
     * Display a listing of the Isapre.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->isapreRepository->pushCriteria(new RequestCriteria($request));
        $isapres = $this->isapreRepository->all();

        return view('isapres.index')
            ->with('isapres', $isapres);
    }

    /**
     * Show the form for creating a new Isapre.
     *
     * @return Response
     */
    public function create()
    {
        return view('isapres.create');
    }

    /**
     * Store a newly created Isapre in storage.
     *
     * @param CreateIsapreRequest $request
     *
     * @return Response
     */
    public function store(CreateIsapreRequest $request)
    {
        $input = $request->all();

        $isapre = $this->isapreRepository->create($input);

        Flash::success('Isapre saved successfully.');

        return redirect(route('isapres.index'));
    }

    /**
     * Display the specified Isapre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $isapre = $this->isapreRepository->findWithoutFail($id);

        if (empty($isapre)) {
            Flash::error('Isapre not found');

            return redirect(route('isapres.index'));
        }

        return view('isapres.show')->with('isapre', $isapre);
    }

    /**
     * Show the form for editing the specified Isapre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $isapre = $this->isapreRepository->findWithoutFail($id);

        if (empty($isapre)) {
            Flash::error('Isapre not found');

            return redirect(route('isapres.index'));
        }

        return view('isapres.edit')->with('isapre', $isapre);
    }

    /**
     * Update the specified Isapre in storage.
     *
     * @param  int              $id
     * @param UpdateIsapreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIsapreRequest $request)
    {
        $isapre = $this->isapreRepository->findWithoutFail($id);

        if (empty($isapre)) {
            Flash::error('Isapre not found');

            return redirect(route('isapres.index'));
        }

        $isapre = $this->isapreRepository->update($request->all(), $id);

        Flash::success('Isapre updated successfully.');

        return redirect(route('isapres.index'));
    }

    /**
     * Remove the specified Isapre from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $isapre = $this->isapreRepository->findWithoutFail($id);

        if (empty($isapre)) {
            Flash::error('Isapre not found');

            return redirect(route('isapres.index'));
        }

        $this->isapreRepository->delete($id);

        Flash::success('Isapre deleted successfully.');

        return redirect(route('isapres.index'));
    }
}
