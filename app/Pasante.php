<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasante extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pasantes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'cedula', 'empresa', 'tutor', 'inicio', 'culminacion', 'especialidad', 'modulo'
    ];

    public function nombreEmpresa(){
        return $this->hasOne('App\Empresa', 'id', 'empresa');
    }

    public function nombreTutor(){
        return $this->hasOne('App\Tutor', 'id', 'tutor');
    }

    /**
    * Obtener la cédula, el nombre y el apellido
    *
    * @return string
    */
    public function getCedulaNombreAttribute(){
        return number_format($this->cedula, 0, '', '.') . ' - ' . $this->nombre . ' ' . $this->apellido;
    }
}
