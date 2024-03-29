<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user have specified ability before the call
     * to specified method.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
        if ($user->isBanned()) {
            return false;
        }
    }

    /**
     * Determine whether the user can view any users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model (user).
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(?User $user, User $model)
    {
        return true;
    }

    /**
     * Determine whether the user can create models (users).
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model (user).
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $user->isModerator() || $user->id == $model->id;
    }

    /**
     * Determine whether the user can delete the model (user).
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $user->isModerator() || $user->id == $model->id;
    }

    /**
     * Determine whether the user can restore the model (user).
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        return $user->isModerator() || $user->id == $model->id;
    }

    /**
     * Determine whether the user can permanently delete the model (user).
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        return false;
    }
}
