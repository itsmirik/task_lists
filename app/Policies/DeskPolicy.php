<?php

namespace App\Policies;

use App\Models\Desk;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeskPolicy
{
    use HandlesAuthorization;

    /**
     * Can $user edit $desk
     *
     * @param User $user
     * @param Desk $desk
     * @return bool
     */
    public function edit(User $user, Desk $desk): bool
    {
        return $desk->user_id == $user->id;
    }
}