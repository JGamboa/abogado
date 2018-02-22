<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Repositories\EmpleadoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EmpleadoController extends AppBaseController
{
    /** @var  EmpleadoRepository */
    private $empleadoRepository;

    public function __construct(EmpleadoRepository $empleadoRepo)
    {
        $this->empleadoRepository = $empleadoRepo;
    }

    /**
     * Display a listing of the Empleado.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->empleadoRepository->pushCriteria(new RequestCriteria($request));
        $empleados = $this->empleadoRepository->all();

        return view('empleados.index')
            ->with('empleados', $empleados);
    }

    /**
     * Show the form for creating a new Empleado.
     *
     * @return Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created Empleado in storage.
     *
     * @param CreateEmpleadoRequest $request
     *
     * @return Response
     */
    public function store(CreateEmpleadoRequest $request)
    {
        $input = $request->all();

        $empleado = $this->empleadoRepository->create($input);

        Flash::success('Empleado saved successfully.');

        return redirect(route('empleados.index'));
    }

    /**
     * Display the specified Empleado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('empleados.index'));
        }

        return view('empleados.show')->with('empleado', $empleado);
    }

    /**
     * Show the form for editing the specified Empleado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('empleados.index'));
        }

        return view('empleados.edit')->with('empleado', $empleado);
    }

    /**
     * Update the specified Empleado in storage.
     *
     * @param  int              $id
     * @param UpdateEmpleadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmpleadoRequest $request)
    {
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('empleados.index'));
        }

        $empleado = $this->empleadoRepository->update($request->all(), $id);

        Flash::success('Empleado updated successfully.');

        return redirect(route('empleados.index'));
    }

    /**
     * Remove the specified Empleado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {

        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('empleados.index'));
        }

        $this->empleadoRepository->delete($id);

        Flash::success('Empleado deleted successfully.');

        return redirect(route('empleados.index'));
    }

    public function asignarUsuario($id){

        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if(empty($empleado->user_id)){

            if(empty($empleado)){
                Flash::error('Empleado no encontrado');

                return redirect(route('empleados.index'));

            }

            return view('empleados.asignar_usuario')->with('empleado', $empleado);
        }else{
            Flash::error('Empleado ya posee usuario');
            return redirect(route('empleados.index'));
        }
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function storeUsuario($id, Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);



        $data = $request->all();

        $user = \App\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $empleado = $this->empleadoRepository->update(['user_id'=> $user->id], $id);
        Flash::success('Usuario asignado exitosamente.');

        return redirect(route('empleados.index'));
    }
}
