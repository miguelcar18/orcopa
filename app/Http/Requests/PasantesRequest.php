<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasantesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        switch($this->method())
        {
            case 'GET':
            case 'DELETE': { return []; }
            case 'POST': {
                return [
                    'nombre'        => 'required', 
                    'apellido'      => 'required',
                    'cedula'        => 'required|unique:pasantes',
                    'empresa'       => 'required',
                    'inicio'        => 'required', 
                    'culminacion'   => 'required', 
                    'especialidad'  => 'required', 
                    'tutor'         => 'required'
                ];
            }
            case 'PUT': {
                return [
                    'nombre'        => 'required', 
                    'apellido'      => 'required',
                    'cedula'        => 'required|unique:pasantes',
                    'empresa'       => 'required',
                    'inicio'        => 'required', 
                    'culminacion'   => 'required', 
                    'especialidad'  => 'required', 
                    'tutor'         => 'required'
                ];
            }
            case 'PATCH': { return []; }
            default:break;
        }
    }

    public function messages(){
        return [
            'nombre.required'       => 'El campo :attribute es obligatorio.',
            'apellido.required'     => 'El campo :attribute es obligatorio.', 
            'cedula.required'       => 'El campo :attribute es obligatorio.', 
            'empresa.required'      => 'El campo :attribute es obligatorio.', 
            'inicio.required'       => 'El campo :attribute es obligatorio.',
            'culminacion.required'  => 'El campo :attribute es obligatorio.', 
            'especialidad.required' => 'El campo :attribute es obligatorio.', 
            'tutor.required'        => 'El campo :attribute es obligatorio.',
            'cedula.unique'         => 'La :attribute ingresada ya ha sido registrada.', 
        ];
    }

    public function attributes(){
        return [
            'nombre'        => 'nombre',
            'apellido'      => 'apellido', 
            'cedula'        => 'cedula', 
            'empresa'       => 'empresa', 
            'inicio'        => 'fecha de inicio', 
            'culminacion'   => 'fecha de culmunación', 
            'especialidad'  => 'especialidad', 
            'tutor'         => 'tutor'
        ];
    }

    public function response(array $errors){
        if ($this->expectsJson()){
            return response()->json([
                'validations'   => false, 
                'errors'        => $errors
            ]);
        }

        return $this->redirector->to($this->getRedirectUrl())
        ->withInput($this->except($this->dontFlash))
        ->withErrors($errors, $this->errorBag);
    }
}
