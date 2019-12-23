<?php

namespace App\Policies;

use App\Receta;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecetasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any recetas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the receta.
     *
     * @param  \App\User  $user
     * @param  \App\Receta  $receta
     * @return mixed
     */
    public function view(User $user, Receta $receta)
    {
        //
    }

    /**
     * Determine whether the user can create recetas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the receta.
     *
     * @param  \App\User  $user
     * @param  \App\Receta  $receta
     * @return mixed
     */
    public function update(User $user, Receta $receta)
    {
        //
    }

    /**
     * Determine whether the user can delete the receta.
     *
     * @param  \App\User  $user
     * @param  \App\Receta  $receta
     * @return mixed
     */
    public function delete(User $user, Receta $receta)
    {
        //
    }

    /**
     * Determine whether the user can restore the receta.
     *
     * @param  \App\User  $user
     * @param  \App\Receta  $receta
     * @return mixed
     */
    public function restore(User $user, Receta $receta)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the receta.
     *
     * @param  \App\User  $user
     * @param  \App\Receta  $receta
     * @return mixed
     */
    public function forceDelete(User $user, Receta $receta)
    {
        //
    }
}
