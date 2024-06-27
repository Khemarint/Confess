<?php

namespace App\Policies;

use App\Models\Brain;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BrainPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Brain $brain): bool
    {
        //
        return ($user->is_admin || $user->is($brain->user));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Brain $brain): bool
    {
        //
        return ($user->is_admin || $user->is($brain->user));
    }


}
