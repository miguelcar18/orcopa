<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Pasante;
use App\Tutor;
use Illuminate\Http\Request;
use App\Http\Requests\PasantesRequest;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class PasantesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasantes = \DB::select('SELECT pasantes.id, pasantes.culminacion, pasantes.cedula, pasantes.nombre, pasantes.apellido,  (SELECT TIMESTAMPDIFF(YEAR,pasantes.culminacion,CURDATE()))  AS anios, (SELECT (TIMESTAMPDIFF(MONTH,pasantes.culminacion,CURDATE())) - (TIMESTAMPDIFF(YEAR,pasantes.culminacion,CURDATE()) * 12)) AS meses, (SELECT DATEDIFF(CURDATE(),DATE_ADD(DATE_ADD(pasantes.culminacion, INTERVAL TIMESTAMPDIFF(YEAR,pasantes.culminacion,CURDATE()) YEAR), INTERVAL (TIMESTAMPDIFF(MONTH,pasantes.culminacion,CURDATE())) - (TIMESTAMPDIFF(YEAR,pasantes.culminacion,CURDATE()) * 12) MONTH))) AS dias FROM pasantes');
        return view('pasantes.index', compact('pasantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tutores = array('' => "Seleccione") + Tutor::orderBy('cedula','ASC')->get()->pluck('cedula_nombre', 'id')->toArray();
        $empresas = array('' => "Seleccione") + Empresa::orderBy('nombre','ASC')->get()->pluck('nombre', 'id')->toArray();
        return view('pasantes.new', compact('tutores', 'empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PasantesRequest $request)
    {
        if($request->ajax()){
        	$separarFechaInicio 		= explode('/', $request['inicio']);
        	$separarFechaCulminacion 	= explode('/', $request['culminacion']);
            $fechaSqlInicio 		= $separarFechaInicio[2].'-'.$separarFechaInicio[1].'-'.$separarFechaInicio[0];
            $fechaSqlCulminacion 	= $separarFechaCulminacion[2].'-'.$separarFechaCulminacion[1].'-'.$separarFechaCulminacion[0];
            if(!empty($request->file('modulo'))) {
                $file = $request->file('modulo');
                $nombre = str_replace(':', '_', Carbon::now()->toDateTimeString().$file->getClientOriginalName());
                $nombre = str_replace(' ', '_', $nombre);
                \Storage::disk('pasantes')->put($nombre,  \File::get($file));
            }
            else
                $nombre = '';
            $campos = [
                'nombre'        => $request['nombre'], 
                'apellido'      => $request['apellido'],
                'cedula' 		=> $request['cedula'], 
                'empresa' 	    => $request['empresa'], 
                'tutor' 		=> $request['tutor'], 
                'inicio' 		=> $fechaSqlInicio, 
                'culminacion' 	=> $fechaSqlCulminacion, 
                'especialidad' 	=> $request['especialidad'], 
                'modulo'    	=> $nombre
            ];

            Pasante::create($campos);
            return response()->json([
                'validations' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasante  $Pasante
     * @return \Illuminate\Http\Response
     */
    public function show(Pasante $pasante)
    {
        return view('pasantes.show', ['pasante' => $pasante]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasante  $Pasante
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasante $pasante)
    {
        $tutores = array('' => "Seleccione") + Tutor::orderBy('cedula','ASC')->get()->pluck('cedula_nombre', 'id')->toArray();
        $empresas = array('' => "Seleccione") + Empresa::orderBy('nombre','ASC')->get()->pluck('nombre', 'id')->toArray();
        return view('pasantes.edit', ['pasante' => $pasante, 'tutores' => $tutores, 'empresas' => $empresas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasante  $Pasante
     * @return \Illuminate\Http\Response
     */
    public function update(PasantesRequest $request, Pasante $pasante)
    {
        if($request->ajax()){
        	$separarFechaInicio 		= explode('/', $request['inicio']);
        	$separarFechaCulminacion 	= explode('/', $request['culminacion']);
            $fechaSqlInicio 		= $separarFechaInicio[2].'-'.$separarFechaInicio[1].'-'.$separarFechaInicio[0];
            $fechaSqlCulminacion 	= $separarFechaCulminacion[2].'-'.$separarFechaCulminacion[1].'-'.$separarFechaCulminacion[0];
            if(!empty($request->file('modulo'))) {
                \File::delete('uploads/pasantes/'.$pasante->curriculum);
                $file = $request->file('modulo');
                $nombre = str_replace(':', '_', Carbon::now()->toDateTimeString().$file->getClientOriginalName());
                $nombre = str_replace(' ', '_', $nombre);
                \Storage::disk('pasantes')->put($nombre,  \File::get($file));
            }
            else
                $nombre = '';
            $campos = [
                'nombre'        => $request['nombre'], 
                'apellido'      => $request['apellido'],
                'cedula' 		=> $request['cedula'], 
                'empresa' 	    => $request['empresa'], 
                'tutor' 		=> $request['tutor'], 
                'inicio' 		=> $fechaSqlInicio, 
                'culminacion' 	=> $fechaSqlCulminacion, 
                'especialidad' 	=> $request['especialidad'], 
                'modulo'    	=> $nombre
            ];
            $pasante->fill($campos);
            $pasante->save();
            return response()->json([
                'validations'       => true,
                'nuevoContenido'    => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasante  $Pasante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasante $pasante)
    {
        \File::delete('uploads/pasantes/'.$pasante->curriculum);
        if (is_null ($pasante))
            \App::abort(404);
        $nombreCompleto = $pasante->nombre.' '.$pasante->apellido;
        $id = $pasante->id;
        $pasante->delete();
        if (\Request::ajax()) {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Pasante "' . $nombreCompleto .'" eliminado satisfactoriamente',
                'id'      => $id
            ));
        } else {
            $mensaje = 'Pasante "'. $nombreCompleto .'" eliminado satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('pasantes.index');
        }
    }
}
