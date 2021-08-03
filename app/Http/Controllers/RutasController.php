<?php

namespace App\Http\Controllers;

use App\Models\Rutas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class RutasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $user_id = auth::id();

        if ($user_id != 1) {

            $datos['rutas'] = Rutas::select(
                'users.name as nombre',
                'rutas.id as id',
                'camions.id as camionId',
                'camions.apodo as camionApodo',
                'rutas.kilometros_inicio as kilometros_inicio',
                'rutas.litros_inicio as litros_inicio',
                'rutas.kilometros_fin as kilometros_fin',
                'rutas.litros_fin as litros_fin',
                'municipio_inicio.nombre as municipio_inicio',
                'estado_inicio.nombre as estado_inicio',
                'municipio_fin.nombre as municipio_fin',
                'estado_fin.nombre as estado_fin'
            )
                ->join('users', 'rutas.user_id', '=', 'users.id')
                ->join('usuario_chofers', 'users.id', '=', 'usuario_chofers.chofer_id')
                ->join('municipios as municipio_inicio', 'rutas.municipio_inicio_id', '=', 'municipio_inicio.id')
                ->join('municipios as municipio_fin', 'rutas.municipio_fin_id', '=', 'municipio_fin.id')
                ->join('estados as estado_inicio', 'municipio_inicio.estado', '=', 'estado_inicio.id')
                ->join('estados as estado_fin', 'municipio_fin.estado', '=', 'estado_fin.id')
                ->join('camions', 'camions.id', '=', 'rutas.camion_id')
                ->where('rutas.user_id', '=', $user_id)->paginate(5);
        }
        return view('ruta.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function create(Request $request)
    {
        //
        $info = request()->except(['_token', '_method']);

        $user_id = auth::id();

        $datos['camiones'] = DB::table('camions')->where('user_id', $user_id)->get();
        $datos['estados'] = DB::table('estados')->get();

        if (request()->has('estado_inicio_id')) {
            $estado_inicio_id = request()->estado_inicio_id;
            $datos['municipios_inicio'] = DB::table('municipios')->get()->where('estado',$estado_inicio_id);
        }

        if (request()->has('estado_fin_id')) {
    
            $estado_id = request()->estado_fin_id;
            $datos['municipios_fin'] =  DB::table('municipios')->get()->where('estado',$estado_id);
        }



        return view('ruta.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function show(Rutas $rutas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function edit(Rutas $rutas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rutas $rutas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rutas $rutas)
    {
        //
    }
}
