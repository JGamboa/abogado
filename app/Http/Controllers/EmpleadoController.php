<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Notifications\UserCreated;
use App\Repositories\EmpleadoRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Empleado as Empleado;
use App\Models\Role;

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
        $empleados = $this->empleadoRepository->all()->where('empresa_id', session('empresa_id'));

        return view('empleados.index')
            ->with(['empleados' => $empleados ]);
    }

    /**
     * Show the form for creating a new Empleado.
     *
     * @return Response
     */
    public function create()
    {
        $usuarios = \App\User::pluck('name', 'id')->all();
        return view('empleados.create')->with(['usuarios' => $usuarios]);
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

        $roles = \App\Models\Role::all();
        $permisos = \App\Models\Permission::all();

        $texto = "";
        $user_roles = [];
        if(isset($empleado->user->id)){

        $user = \App\User::find($empleado->user->id);
        $user_roles = $user->roles->pluck('id')->toArray();

        $texto = "{";
        foreach ($roles as $role){
            $texto .= "\"" . $role->id . "\"" . ":[";

            foreach($role->permissions as $permission){
                $texto .= $permission->id . ",";
            }

            $texto .=  "],";
        }

        $texto = str_replace(",]", "]", $texto);
        $texto = rtrim($texto,",");
        $texto .= "}";

        }


        return view('empleados.show')->with(['empleado' => $empleado,
                                                    'roles' => $roles,
                                                    'permisos' => $permisos,
                                                    'user_roles' => $user_roles,
                                                    'json' => $texto]);
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
        $usuarios = \App\User::pluck('name', 'id')->all();
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('empleados.index'));
        }

        return view('empleados.edit')->with(['empleado' => $empleado, 'usuarios' => $usuarios]);
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

        $user->notify(New UserCreated());

        $empleado = $this->empleadoRepository->update(['user_id'=> $user->id], $id);
        Flash::success('Usuario asignado exitosamente.');

        return redirect(route('empleados.index'));
    }

    protected function permisos($id, Request $request){

        /* @var $empleado Empleado */
        $empleado = Empleado::find($id);
        $usuario = User::find($empleado->user_id);

        $roles = Role::find($request->input('roles', []));
        $usuario->syncRoles($roles);

        Flash::success('Permisos guardados exitosamente.');

        return redirect(route('empleados.show', $empleado->id));

    }
}
