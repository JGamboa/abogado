<?php

namespace App\Http\Controllers;

use App\Models\Corte;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Permission;
use Flash;

class RoleController extends Controller
{
    public function index()
    {
        $result = Role::latest()->paginate();
        $permissions = Permission::all();

        return view('roles.index', compact('result', 'permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:roles',
            'guard_name' => 'required|min:1']);

        if( Role::create($request->only(['name', 'guard_name', 'empresa_id'])) ) {
            flash('Rol Añadido');
        }else{
            flash()->error('Error al añadir Rol');
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));

    }

    public function update(Request $request, $id)
    {
        if($role = Role::findOrFail($id)) {
            // admin role has everything
            if($role->name === 'SUPER ADMINISTRADOR') {
                $role->syncPermissions(Permission::all());
                return redirect()->route('roles.index');
            }

            $permissions = $request->get('permissions', []);
            $role->syncPermissions($permissions);
            flash( $role->name . ' permisos actualizados.');
        } else {
            flash()->error( 'Rol con id '. $id .' no encontrado.');
        }

        return redirect()->route('roles.index');
    }

    public function destroy($id){
        $corte = Corte::find($id);

        if (empty($corte)) {
            Flash::error('Rol no encontrado');

            return redirect(route('roles.index'));
        }

        $corte->delete();

        Flash::success('Rol eliminado exitosamente.');

        return redirect(route('roles.index'));
    }
}
