<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Entrega;
use Illuminate\Auth\Access\HandlesAuthorization;

class EntregaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    public function admin(User $user){
        return $user->admin == 1;
    }
}
