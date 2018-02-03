<?php

namespace App\Http\Controllers;

use App\Tutor;
use Illuminate\Http\Request;
use App\Http\Requests\TutoresRequest;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class TutoresController extends Controller
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
        $tutores = Tutor::All();
        return view('tutores.index', compact('tutores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tutores.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TutoresRequest $request)
    {
        if($request->ajax()){
            if(!empty($request->file('curriculum'))) {
                $file = $request->file('curriculum');
                $nombre = str_replace(':', '_', Carbon::now()->toDateTimeString().$file->getClientOriginalName());
                $nombre = str_replace(' ', '_', $nombre);
                \Storage::disk('tutores')->put($nombre,  \File::get($file));
            }
            else
                $nombre = '';
            $campos = [
                'nombre'        => $request['nombre'], 
                'apellido'      => $request['apellido'],
                'cedula' 		=> $request['cedula'], 
                'cargo' 		=> $request['cargo'], 
                'curriculum'    => $nombre
            ];
            Tutor::create($campos);
            return response()->json([
                'validations' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tutor  $Tutor
     * @return \Illuminate\Http\Response
     */
    public function show(Tutor $tutor, $id)
    {
        $tutor = Tutor::find($id);
        return view('tutores.show', ['tutor' => $tutor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tutor  $Tutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutor $tutor, $id)
    {
        $tutor = Tutor::find($id);
        return view('tutores.edit', ['tutor' => $tutor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tutor  $Tutor
     * @return \Illuminate\Http\Response
     */
    public function update(TutoresRequest $request, Tutor $tutor, $id)
    {
        $tutor = Tutor::find($id);
        if($request->ajax()){
            if(!empty($request->file('curriculum'))) {
                \File::delete('uploads/tutores/'.$tutor->curriculum);
                $file = $request->file('curriculum');
                $nombre = str_replace(':', '_', Carbon::now()->toDateTimeString().$file->getClientOriginalName());
                $nombre = str_replace(' ', '_', $nombre);
                \Storage::disk('tutores')->put($nombre,  \File::get($file));
            }
            else
                $nombre = '';
            $campos = [
                'nombre'        => $request['nombre'], 
                'apellido'      => $request['apellido'],
                'cedula' 		=> $request['cedula'], 
                'cargo' 		=> $request['cargo'], 
                'curriculum'    => $nombre
            ];
            $tutor->fill($campos);
            $tutor->save();
            return response()->json([
                'validations'       => true,
                'nuevoContenido'    => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tutor  $Tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutor $tutor, $id)
    {
        $tutor = Tutor::find($id);
        \File::delete('uploads/tutores/'.$tutor->curriculum);
        if (is_null ($tutor))
            \App::abort(404);
        $nombreCompleto = $tutor->nombre.' '.$tutor->apellido;
        $id = $tutor->id;
        $tutor->delete();
        if (\Request::ajax()) {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Tutor "' . $nombreCompleto .'" eliminado satisfactoriamente',
                'id'      => $id
            ));
        } else {
            $mensaje = 'Tutor "'. $nombreCompleto .'" eliminado satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('tutores.index');
        }
    }
}
