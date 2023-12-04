<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function servico(){
        return $this->belongsTo('App\Models\Servico');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function entrega(){
        return $this->belongsTo('App\Models\Entrega');
    }
}
