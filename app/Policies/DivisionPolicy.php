<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Division;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class DivisionPolicy
{
    Use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     *
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_division');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Division $division): bool
    {
        return $user->can('view_division');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_division');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Division $division): bool
    {
        return $user->can('update_division');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Division $division): bool
    {
        return $user->can('delete_division');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Division $division): bool
    {
        return $user->can('restore_division');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Division $division): bool
    {
        return  $user->can('force_delete_division');
    }

    
}
