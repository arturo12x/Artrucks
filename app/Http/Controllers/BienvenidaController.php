<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;
class BienvenidaController extends Controller
{
    //

public function index(){

$user_id=Auth::user()->id;



$chofer= DB::table('chofers')
    ->join('usuario_chofers', 'chofers.id', '=', 'usuario_chofers.chofer_id')
    ->join('users', 'usuario_chofers.user_id', '=', 'users.id')
 //EL SELECT ES PARA TRAERME SOLO LOS DATOS QUE QUIERO DE LAS TRES TABLAS SELECCIONADAS ESTO PORQUE SE REPITE EL NOMBRE DE (ID) ASI SOLO ME TRAIGO EL ID QUE ME INTERSA QUE ES EL DE CHOFERS
    ->where('usuario_chofers.user_id','=',$user_id)->pluck('foto');

    if(isset($user_id)&& $user_id!=1){     
        return view("bienvenida.index",compact('chofer'));
    }
    else{
        return view("bienvenida.index");
    }




}

}
