<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


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


        $datos['chofers'] = DB::table('chofers')
            ->join('usuario_chofers', 'chofers.id', '=', 'usuario_chofers.chofer_id')
            ->join('users', 'usuario_chofers.user_id', '=', 'users.id')
            ->select(
                'chofers.id as id',
                'chofers.fechaNacimiento as fechaNacimiento',
                'chofers.foto as foto',
                'users.name as name',
                'users.email as email',
                'users.password as password'
            ) //EL SELECT ES PARA TRAERME SOLO LOS DATOS QUE QUIERO DE LAS TRES TABLAS SELECCIONADAS ESTO PORQUE SE REPITE EL NOMBRE DE (ID) ASI SOLO ME TRAIGO EL ID QUE ME INTERSA QUE ES EL DE CHOFERS
            ->paginate(8);




        $size = count($datos['chofers']);

        for ($i = 0; $i < $size; $i++) {
            $datos['chofers'][$i]->fechaNacimiento = Carbon::parse($datos['chofers'][$i]->fechaNacimiento)->age;
        }



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


        $hoy = date('m/d/Y');
        $valida = [
            'nombre' => 'required|string|max:100',
            'fechaNacimiento' => 'required|before_or_equal:' . $hoy,
            'email' => 'required|email|unique:users',
            'foto' => 'required|file|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'fechaNacimiento.required' => 'La fecha de nacimiento es requerida',
            'fechaNacimiento.before_or_equal' => 'La fecha de nacimiento no puede ser mayor a la fecha actual',
            'foto.required' => 'La foto es requerida',
            'foto.mimes' => 'La foto debe ser de formato jpeg,jpg o png',
            'email.unique' => 'El correo ingresado ya se encuentra en otra cuenta, por favor registre uno nuevo'

        ];

        $this->validate($request, $valida, $mensaje);
        //$datosEmpleado=request()->all();

        $datosChofer = request()->except('_token');

        if ($request->hasFile('foto')) {
            $datosChofer['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        //insertar datos (fechaNAC y foto en tabla chofer)
        $inserIdChofer = Chofer::insertGetId([
            'fechaNacimiento' => $datosChofer['fechaNacimiento'],
            'foto' => $datosChofer['foto'],
        ]);

        $name = $datosChofer['nombre'];
        $email = $datosChofer['email'];
        $pass = 'password';

        $inserIdUser = DB::table('users')->insertGetId([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($pass),
        ]);

        DB::table('usuario_chofers')->insert([
            'user_id' => $inserIdUser,
            'chofer_id' => $inserIdChofer,
        ]);

        //   return response()->json($datosEmpleado);

        return redirect('chofer')->with('mensaje', 'Chofer agregado con exito');
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



        $chofers = DB::table('chofers')
            ->join('usuario_chofers', 'chofers.id', '=', 'usuario_chofers.chofer_id')
            ->join('users', 'usuario_chofers.user_id', '=', 'users.id')
            ->select(
                'chofers.id as id',
                'chofers.fechaNacimiento as fechaNacimiento',
                'chofers.foto as foto',
                'users.name as name',
                'users.email as email',
                'users.password as password'
            )->where('chofers.id', $id)->get();

        $chofers['chofer'] = $chofers[0];
        unset($chofers[0]);

        return view('chofer.edit', $chofers);
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


        $hoy = date('m/d/Y');
        $valida = [
            'nombre' => 'required|string|max:100',
            'fechaNacimiento' => 'required|before_or_equal:' . $hoy,
            'email' => 'required|email|unique:users' . ($id ? ",id,$id" : ''),
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'fechaNacimiento.required' => 'La fecha de nacimiento es requerida',
            'fechaNacimiento.before_or_equal' => 'La fecha de nacimiento no puede ser mayor a la fecha actual',
            'email.unique' => 'El correo ingresado ya se encuentra en otra cuenta, por favor registre uno nuevo',

        ];

        if (request()->hasFile('foto')) {
             array_push($valida,['foto' => 'required|file|max:10000|mimes:jpeg,png,jpg']);
            array_push($mensaje,['foto.required' => 'La foto es requerida',
            'foto.mimes' => 'La foto debe ser de formato jpeg,jpg o png']);
          
        }


        $this->validate($request, $valida, $mensaje);

        $datosChofer = request()->except(['_token', '_method']);
        if (request()->hasFile('foto')) {
            $chofer = Chofer::findOrfail($id);
            Storage::delete('public/' . $chofer->foto);
            $datosChofer['foto'] = $request->file('foto')->store('uploads', 'public');
        }



        if (request()->hasFile('foto')) {
            Chofer::where('id', $id)->update([
                'fechaNacimiento' => $datosChofer['fechaNacimiento'],
                'foto' => $datosChofer['foto'],
            ]);
        } else {
            Chofer::where('id', $id)->update([
                'fechaNacimiento' => $datosChofer['fechaNacimiento'],

            ]);
        }

        $user_id = DB::table('usuario_chofers')->where('chofer_id', '=', $id)->pluck('user_id');
        $name = $datosChofer['nombre'];
        $email = $datosChofer['email'];
        $pass = 'password';


        DB::table('users')->where('id', $user_id)->update([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($pass),
        ]);

        DB::table('usuario_chofers')->where('chofer_id', '=', $id)->update([
            'user_id' =>($user_id->implode('')),
            'chofer_id' => $id,
        ]);


        // return view('chofer.edit', compact('chofer'));

        return redirect('chofer')->with('mensaje', 'Chofer actualizado');
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


        if (Storage::delete('public/' . $chofer->foto)) {
            $user_id = DB::table('usuario_chofers')->where('chofer_id', '=', $id)->pluck('user_id');
            DB::table('usuario_chofers')->where('chofer_id', '=', $id)->delete();
            DB::table('users')->where('id', '=', $user_id)->delete();
            Chofer::destroy($id);
        }

        return redirect('chofer')->with('mensaje', 'Chofer eliminado'); //Hacemos un redirect para volver al index ruta
    }
}
