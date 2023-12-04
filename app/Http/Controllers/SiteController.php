<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;
class SiteController extends Controller
{
    public function index(){
        $servicos = Servico::all();
        return view('site.index',compact('servicos'));
    }
}
