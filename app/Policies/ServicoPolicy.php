<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Servico;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function admin(User $user){
        return $user->admin == 1;
    }
}
