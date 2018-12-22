<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Permission;

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

        if( Role::create($request->only(['name', 'guard_name'])) ) {
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
}
