<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Pasante;
use App\Tutor;
use App\User;
use Illuminate\Http\Request;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class AjustesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function respaldar(){
        return view('ajustes.respaldar');
    }

    public function importar(){
        return view('ajustes.importar');
    }

    public function accionRespaldar(){
        //$usuarios = User::all();
        $file= base_path(). "/uploads/respaldo.sql";
        $nombre = str_replace(':', '_', Carbon::now()->toDateTimeString().'_respaldo.sql');
        $nombre = str_replace(' ', '_', $nombre);
        $headers = array(
            '"Content-Type:text/sql"',
        );

        $archivo = fopen($file, "w") or die("No se pudo abrir el archivo!");

        $txtTablas = "
CREATE DATABASE  IF NOT EXISTS `orcopa`;
USE `orcopa`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `pasantes`;
DROP TABLE IF EXISTS `password_resets`;
DROP TABLE IF EXISTS `empresas`;
DROP TABLE IF EXISTS `tutores`;
DROP TABLE IF EXISTS `migrations`;
DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `empresas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `empresas_correo_unique` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_000000_create_users_table',1),(14,'2014_10_12_100000_create_password_resets_table',1),(15,'2018_02_03_170604_create_tutors_table',1),(16,'2018_02_04_110007_create_empresas_table',1),(17,'2018_02_04_125505_create_pasantes_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutores`
--

CREATE TABLE `tutores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `curriculum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tutores_cedula_unique` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `pasantes`
--

CREATE TABLE `pasantes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `inicio` date NOT NULL,
  `culminacion` date NOT NULL,
  `especialidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tutor` int(10) unsigned NOT NULL,
  `empresa` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pasantes_cedula_unique` (`cedula`),
  KEY `pasantes_tutor_foreign` (`tutor`),
  KEY `pasantes_empresa_foreign` (`empresa`),
  CONSTRAINT `pasantes_empresa_foreign` FOREIGN KEY (`empresa`) REFERENCES `empresas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pasantes_tutor_foreign` FOREIGN KEY (`tutor`) REFERENCES `tutores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`),
  UNIQUE KEY `usuarios_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

        fwrite($archivo, $txtTablas);

        $empresas = App\Empresa::all();
        if(count($empresas) > 0){
        $countEmpresas = 0;
        $txtEmpresas = "

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` (`nombre`, `direccion`, `correo`, `telefono`, `contacto`, `descripcion`, `created_at`, `updated_at`) VALUES ";
        foreach ($empresas as $empresa) {
            $countEmpresas++;
            $txtEmpresas .= "('".$empresa->nombre."','".$empresa->direccion."','".$empresa->correo."','".$empresa->telefono."','".$empresa->contacto."','".$empresa->descripcion."','".$empresa->created_at."','".$empresa->updated_at."')";
            if($countEmpresas < count($empresas))
                $txtEmpresas .= ",";
        }

        $txtEmpresas .= ";
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;"; 
        fwrite($archivo, $txtEmpresas);
        }

        $tutores = App\Tutor::all();
        if(count($tutores) > 0){
        $countTutores = 0;
        $txtTutores = "

LOCK TABLES `tutores` WRITE;
/*!40000 ALTER TABLE `tutores` DISABLE KEYS */;
INSERT INTO `tutores` (`nombre`, `apellido`, `cedula`, `curriculum`, `cargo`, `created_at`, `updated_at`) VALUES ";
        foreach ($tutores as $tutor) {
            $countTutores++;
            $txtTutores .= "('".$tutor->nombre."', '".$tutor->apellido."', '".$tutor->cedula."', '".$tutor->curriculum."', '".$tutor->cargo."', '".$tutor->created_at."', '".$tutor->updated_at."')";
            if($countTutores < count($tutores))
                $txtTutores .= ",";
        }

        $txtTutores .= ";
/*!40000 ALTER TABLE `tutores` ENABLE KEYS */;
UNLOCK TABLES;"; 
        fwrite($archivo, $txtTutores);
        }

        $pasantes = App\Pasante::all();
        if(count($pasantes) > 0){
        $countPasantes = 0;
        $txtPasantes = "

LOCK TABLES `pasantes` WRITE;
/*!40000 ALTER TABLE `pasantes` DISABLE KEYS */;
INSERT INTO `pasantes` (`nombre`, `apellido`, `cedula`, `inicio`, `culminacion`, `especialidad`, `modulo`, `tutor`, `empresa`, `created_at`, `updated_at`) VALUES ";
        foreach ($pasantes as $pasante) {
            $countPasantes++;
            $txtPasantes .= "('".$pasante->nombre."', '".$pasante->apellido."', '".$pasante->cedula."', '".$pasante->inicio."', '".$pasante->culminacion."', '".$pasante->especialidad."', '".$pasante->modulo."', '".$pasante->tutor."', '".$pasante->empresa."', '".$pasante->created_at."', '".$pasante->updated_at."')";
            if($countPasantes < count($pasantes))
                $txtPasantes .= ",";
        }

        $txtPasantes .= ";
/*!40000 ALTER TABLE `pasantes` ENABLE KEYS */;
UNLOCK TABLES;"; 
        fwrite($archivo, $txtPasantes);
        }

        $usuarios = App\User::all();
        if(count($usuarios) > 0){
        $countUsuarios = 0;
        $txtUsuarios = "

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`name`, `email`, `password`, `details`, `path`, `username`, `rol`, `remember_token`, `created_at`, `updated_at`) VALUES ";
        foreach ($usuarios as $usuario) {
            $countUsuarios++;
            $txtUsuarios .= "('".$usuario->name."', '".$usuario->email."', '".$usuario->password."', '".$usuario->details."', '".$usuario->path."', '".$usuario->username."', '".$usuario->rol."', '".$usuario->remember_token."', '".$usuario->created_at."', '".$usuario->updated_at."')";
            if($countUsuarios < count($usuarios))
                $txtUsuarios .= ",";
        }

        $txtUsuarios .= ";
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
"; 
        fwrite($archivo, $txtUsuarios);
        }

        fclose($archivo);

        return Response::download($file, $nombre, $headers);
    }
}
