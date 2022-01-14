<?php

namespace App\Policies;

use App\Models\Card;
use App\Models\Desk;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CardPolicy
{
    use HandlesAuthorization;

    /**
     * Can $user edit $card
     *
     * @param User $user
     * @param Card $card
     * @return bool
     */
    public function edit(User $user, Card $card): bool
    {
        return Desk::findOrFail($card->desk_id)->user_id == $user->id;
    }
}