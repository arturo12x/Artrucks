<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['chofers'] = Chofer::paginate(5);
        return view('chofer.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('chofer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosEmpleado=request()->all();
        $datosEmpleado = request()->except('_token');

        if ($request->hasFile('foto')) {
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Chofer::insert($datosEmpleado);
     //   return response()->json($datosEmpleado);

     return redirect('chofer')->with('mensaje','Chofer agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function show(Chofer $chofer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $chofer = Chofer::findOrfail($id);
        return view('chofer.edit', compact('chofer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpleado = request()->except(['_token', '_method']);


        if (request()->hasFile('foto')) {
            $chofer = Chofer::findOrfail($id);
            Storage::delete('public/' . $chofer->foto);
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Chofer::where('id', '=', $id)->update($datosEmpleado);
        $chofer = Chofer::findOrfail($id);
        return view('chofer.edit', compact('chofer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $chofer = Chofer::findOrfail($id);
if(Storage::delete('public/' . $chofer->foto)){
    Chofer::destroy($id);
}
    


return redirect('chofer')->with('mensaje','Chofer eliminado');//Hacemos un redirect para volver al index ruta
    }
}