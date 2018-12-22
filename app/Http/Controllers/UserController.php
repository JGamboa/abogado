<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController as AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use Image;
use App\Models\Role;
use App\Models\Permission;
use App\User;
use App\Models\Empleado;

class UserController extends AppBaseController
{

    public function index()
    {
        $empleado = Empleado::pluck('user_id')->all();
        $result = User::whereIn('id', $empleado)->latest()->paginate();
        return view('users.index', compact('result'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('users.new', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'
        ]);

        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);

        // Create the user
        if ( $user = User::create($request->except('roles', 'permissions')) ) {
            $this->syncPermissions($request, $user);
            flash('User has been created.');
        } else {
            flash()->error('Unable to create user.');
        }

        return redirect()->route('usuarios.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::all('name', 'id');

        return view('users.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1'
        ]);

        // Get the user
        $user = User::findOrFail($id);
        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));

        // check for password change
        if($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        // Handle the user roles
        $this->syncPermissions($request, $user);

        $user->save();
        flash()->success('User has been updated.');
        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {
        if ( Auth::user()->id == $id ) {
            flash()->warning('Deletion of currently logged in user is not allowed :(')->important();
            return redirect()->back();
        }

        if( User::findOrFail($id)->delete() ) {
            flash()->success('User has been deleted');
        } else {
            flash()->success('User not deleted');
        }

        return redirect()->back();
    }

    private function syncPermissions(Request $request, $user)
    {
        /* @var User $user */
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }

    public function profile(){
        return view('users.profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $date_append = date("Y-m-d-His");
            $filename = $date_append . '.' .$avatar->getClientOriginalExtension();
            $folder = storage_path('app/public');

            Image::make($avatar)->resize(300, 300)->save( $folder . '/avatars/' . $filename );

            $user = Auth::user();

            if($user->avatar != "default.jpg"){
                if(file_exists(storage_path('app/public/avatars/'. $user->avatar))){
                    unlink(storage_path('app/public/avatars/'. $user->avatar));
                }
            }

            $user->avatar = $filename;
            $user->save();
        }

        return view('users.profile', array('user' => Auth::user()) );

    }
}
