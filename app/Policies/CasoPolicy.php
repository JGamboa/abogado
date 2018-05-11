<?php

namespace App\Policies;

use App\User;
use App\Models\Caso;
use Illuminate\Auth\Access\HandlesAuthorization;

class CasoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the caso.
     *
     * @param  \App\User  $user
     * @param  \App\Caso  $caso
     * @return mixed
     */
    public function view(User $user, Caso $caso)
    {
        //
    }

    /**
     * Determine whether the user can create casos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the caso.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Caso  $caso
     * @return mixed
     */
    public function update(User $user, Caso $caso)
    {
        return $user->empleado->id === $caso->responsable_proceso || $user->hasRole('SECRETARIA');
        //
    }

    /**
     * Determine whether the user can delete the caso.
     *
     * @param  \App\User  $user
     * @param  \App\Caso  $caso
     * @return mixed
     */
    public function delete(User $user, Caso $caso)
    {
        //
    }

}
