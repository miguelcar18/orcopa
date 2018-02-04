<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Pasante;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresasRequest;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class EmpresasController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::All();
        return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresasRequest $request)
    {
        if($request->ajax()){
            $campos = [
                'nombre'        => $request['nombre'], 
                'direccion'     => $request['direccion'],
                'correo' 		=> $request['correo'], 
                'telefono' 		=> $request['telefono'], 
                'contacto'    	=> $request['contacto'], 
                'descripcion' 	=> $request['descripcion']
            ];
            Empresa::create($campos);
            return response()->json([
                'validations' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        $pasantes = Pasante::where('empresa', $empresa->id)->get();
        return view('empresas.show', ['empresa' => $empresa, 'pasantes' => $pasantes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresas.edit', ['empresa' => $empresa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresasRequest $request, Empresa $empresa)
    {
        if($request->ajax()){
            $campos = [
                'nombre'        => $request['nombre'], 
                'direccion'     => $request['direccion'],
                'correo' 		=> $request['correo'], 
                'telefono' 		=> $request['telefono'], 
                'contacto'    	=> $request['contacto'], 
                'descripcion' 	=> $request['descripcion']
            ];
            $empresa->fill($campos);
            $empresa->save();
            return response()->json([
                'validations'       => true,
                'nuevoContenido'    => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        if (is_null ($empresa))
            \App::abort(404);
        $nombreCompleto = $empresa->nombre;
        $id = $empresa->id;
        $empresa->delete();
        if (\Request::ajax()) {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Empresa "' . $nombreCompleto .'" eliminada satisfactoriamente',
                'id'      => $id
            ));
        } else {
            $mensaje = 'Empresa "'. $nombreCompleto .'" eliminada satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('empresas.index');
        }
    }
}
