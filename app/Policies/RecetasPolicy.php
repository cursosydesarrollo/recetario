<?php

namespace App\Policies;

use App\Receta;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class RecetasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any recetas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user = null)
    {
        return true;
    }

    /**
     * Determine whether the user can view the receta.
     *
     * @param  \App\User  $user
     * @param  \App\Receta  $receta
     * @return mixed
     */
    public function view(User $user = null, Receta $receta)
    {

        if ($receta->published == 2) {
            
            if ($user->can('editar recetas no publicadas')) {
                return true;
            }

        } else {
            return true;
        }
        
    }

    /**
     * Determine whether the user can create recetas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('crear recetas')) {
            return true;
        }
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

        if($user->can('editar recetas propias')) {
            return $user->id == $receta->user_id;
        }


        if ($user->can('editar recetas')) {
            return true;
        }      
   
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
        if ($user->can('eliminar recetas propias')) {
            return $user->id === $receta->user_id;
        }

        if ($user->can('delete any post')) {
            return true;
        }
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
