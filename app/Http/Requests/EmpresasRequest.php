<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresasRequest extends FormRequest
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
                    'direccion'     => 'required',
                    'correo'        => 'required|unique:empresas',
                    'telefono'      => 'required',
                    'contacto'      => 'required', 
                    'descripcion'   => 'required'
                ];
            }
            case 'PUT': {
                return [
                    'nombre'        => 'required', 
                    'direccion'     => 'required',
                    'correo'        => 'required|unique:empresas',
                    'telefono'      => 'required',
                    'contacto'      => 'required', 
                    'descripcion'   => 'required'
                ];
            }
            case 'PATCH': { return []; }
            default:break;
        }
    }

    public function messages(){
        return [
            'nombre.required'       => 'El campo :attribute es obligatorio.',
            'direccion.required'    => 'El campo :attribute es obligatorio.', 
            'correo.required'       => 'El campo :attribute es obligatorio.', 
            'telefono.required'     => 'El campo :attribute es obligatorio.',
            'contacto.required'     => 'El campo :attribute es obligatorio.', 
            'descripcion.required'  => 'El campo :attribute es obligatorio.',
            'correo.unique'         => 'EL :attribute ingresado ya ha sido registrada.', 
        ];
    }

    public function attributes(){
        return [
            'nombre'        => 'nombre',
            'direccion'     => 'direccion', 
            'correo'        => 'correo', 
            'telefono'      => 'telefono',
            'contacto'      => 'contacto',
            'descripcion'   => 'descripcion'
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
