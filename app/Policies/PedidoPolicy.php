<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pedido;
use Illuminate\Auth\Access\HandlesAuthorization;

class PedidoPolicy
{
    use HandlesAuthorization;

    public function verPedido(User $user, Pedido $pedido){
        return $user->id === $pedido->user_id;
    }
    public function index(User $user){
        return $user->admin == 1;
    }
    public function destroy(User $user, Pedido $pedido){
        return $user->admin == 1 || $user->id == $pedido->user_id;
    }
}
