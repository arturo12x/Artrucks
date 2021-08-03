<?php

namespace App\Http\Controllers;

use App\Models\Camion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class CamionController extends Controller
{
    /**
     * Display a listing of the resource.
     *P
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $datos['camiones'] = Camion::get();
        return view('camion.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('camion.create');
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

        $validayear = date('Y', strtotime('+1 year'));

        $valida = [
            'apodo'=>'required',
            'marca' => 'required',
            'tipo' => 'required',
            'anio' => 'required|numeric|min:1999|max:' . $validayear,
            'kilometraje' =>'required|min:1'

        ];

        $mensaje = [
            'required' => 'El campo :attribute es requerido',
            'anio.min' => 'El año del camion no puede ser menor de 1999',
            'anio.max' => 'El año del camion no puede ser mayor a ' . $validayear,
            'anio.numeric' => 'El campo de año deber ser numérico',

        ];

        $this->validate($request, $valida, $mensaje);

        $datosCamion= request()->except(['_token', '_method']);;

$userid=Auth::id();

$datosCamion['user_id']=$userid;

Camion::insert($datosCamion);

return redirect('camion')->with('mensaje', 'Camion agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function show(Camion $camion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camion = Camion::findOrfail($id);

        return view('camion.edit', compact('camion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Obtenfo el año actual y le sumo uno para solo permitir camiones del año (siempre va adelantado 1 año los años en autos) //
        $validayear = date('Y', strtotime('+1 year'));

        $valida = [
            'apodo'=>'required',
            'marca' => 'required',
            'tipo' => 'required',
            'anio' => 'required|numeric|min:1999|max:' . $validayear,
            'kilometraje' =>'required|min:1'

        ];

        $mensaje = [
            'required' => 'El campo :attribute es requerido',
            'anio.min' => 'El año del camion no puede ser menor de 1999',
            'anio.max' => 'El año del camion no puede ser mayor a ' . $validayear,
            'anio.numeric' => 'El campo de año deber ser numérico',

        ];

        $this->validate($request, $valida, $mensaje);

        $datosCamion= request()->except(['_token', '_method']);;

Camion::where('id',$id)->update($datosCamion);

return redirect('camion')->with('mensaje', 'Camion actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Camion::destroy($id);
        return redirect('camion')->with('mensaje', 'Camion eliminado');
    }
}
