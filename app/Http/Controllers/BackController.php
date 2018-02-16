<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackController extends Controller{
    
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		$pasantes = \DB::select('SELECT (SELECT TIMESTAMPDIFF(YEAR,pasantes.culminacion,CURDATE()))  AS anios, (SELECT (TIMESTAMPDIFF(MONTH,pasantes.culminacion,CURDATE())) - (TIMESTAMPDIFF(YEAR,pasantes.culminacion,CURDATE()) * 12)) AS meses, (SELECT DATEDIFF(CURDATE(),DATE_ADD(DATE_ADD(pasantes.culminacion, INTERVAL TIMESTAMPDIFF(YEAR,pasantes.culminacion,CURDATE()) YEAR), INTERVAL (TIMESTAMPDIFF(MONTH,pasantes.culminacion,CURDATE())) - (TIMESTAMPDIFF(YEAR,pasantes.culminacion,CURDATE()) * 12) MONTH))) AS dias FROM pasantes');
		$booleanPasantes = 0;

		foreach($pasantes as $data){
			if($data->anios >= 0 && $data->meses >= 0 && $data->dias >= -5){
				$booleanPasantes = 1;
			}
		}

		return view("layouts.base", compact('booleanPasantes'));
	}
}