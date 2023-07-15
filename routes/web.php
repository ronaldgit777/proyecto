<?php

use App\Custom\MyClass;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignarpromaController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\AdelantoproController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\SueldoproController;
use App\Http\Controllers\TurnoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
Route::get('/profesor', function () {
    return view('profesor.index');
});
Route::get('/sueldopro', function () {
    return view('sueldopro.index');
});

Route::get('/profesor', function () {
    return view('profesor.hola');
});
*/

Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

//Auth::routes();

//route::get('/home',[ProfesorController::class,'index'])->name('home');
//route::get('/home',[SueldoproController::class,'index'])->name('home');


        //route::get('/',[ProfesorController::class,'index'])->name('home');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
         //abre el formulario de registro de usuario
        // route::resource('user',user::class)->middleware('auth');
        route::resource('secretaria',SecretariaController::class)->middleware('auth');
        route::resource('profesor',ProfesorController::class)->middleware('auth');
        
        route::resource('sueldopro',SueldoproController::class)->middleware('auth');
        route::resource('adelantopro',adelantoprocontroller::class)->middleware('auth');
        route::resource('periodo',PeriodoController::class)->middleware('auth');
        route::resource('aula',AulaController::class)->middleware('auth');
        route::resource('materia',MateriaController::class)->middleware('auth');       
        route::resource('asignarproma',AsignarpromaController::class)->middleware('auth');

      
     
     
        route::resource('alumno',AlumnoController::class)->middleware('auth');
        route::resource('inscripcion',InscripcionController::class)->middleware('auth');
        route::resource('actividad',ActividadController::class)->middleware('auth');
        //route::get('/register','auth.register')->name('register');
        Route::get('/registroEmpleado', [App\Http\Controllers\Auth\RegisterController::class, 'formularioEmpleado'])->name('formularioEmpleado')->middleware('auth');
        Route::post('/registroEmpleado', [App\Http\Controllers\Auth\RegisterController::class, 'registrarEmpleado'])->name('registroEmpleado')->middleware('auth');

        Route::get('/asigpro', [App\Http\Controllers\AsignarpromaController::class, 'index2'])->name('index2')->middleware('auth');
        Route::post('/asigpro', [App\Http\Controllers\AsignarpromaController::class, 'index2'])->name('index2')->middleware('auth');
        Route::get('/alumpro', [App\Http\Controllers\AlumnoController::class, 'index2'])->name('index2')->middleware('auth');
        Route::post('/alumpro', [App\Http\Controllers\AlumnoController::class, 'index2'])->name('index2')->middleware('auth');
       // Route::get('/asignarproma', [App\Http\Controllers\AsignarpromaController::class, 'asigpro'])->name('asig')->middleware('auth');
/*
Route::middleware(['auth', 'admin'])->group(function () {
    //abre el formulario de registro de usuario
   // route::resource('user',user::class)->middleware('auth');
   route::resource('secretaria',SecretariaController::class)->middleware('auth');
   route::resource('profesor',ProfesorController::class)->middleware('auth');
   route::resource('sueldopro',SueldoproController::class)->middleware('auth');
   route::resource('detallesupro',DetallesuproController::class)->middleware('auth');
   route::resource('periodo',PeriodoController::class)->middleware('auth');
   route::resource('aula',AulaController::class)->middleware('auth');
   route::resource('materia',MateriaController::class)->middleware('auth');       
   route::resource('asignarproma',AsignarpromaController::class)->middleware('auth');
   route::resource('alumno',AlumnoController::class)->middleware('auth');
   route::resource('inscripcion',InscripcionController::class)->middleware('auth');
   route::resource('actividad',ActividadController::class)->middleware('auth');
   //route::get('/register','auth.register')->name('register');
   Route::get('/registroEmpleado', [App\Http\Controllers\Auth\RegisterController::class, 'formularioEmpleado'])->name('formularioEmpleado')->middleware('auth');
   Route::post('/registroEmpleado', [App\Http\Controllers\Auth\RegisterController::class, 'registrarEmpleado'])->name('registroEmpleado')->middleware('auth');
});
Route::middleware(['auth', 'secretaria'])->group(function () {
    //abre el formulario de registro de usuario
   // route::resource('user',user::class)->middleware('auth');
   route::resource('profesor',ProfesorController::class)->middleware('auth');
   route::resource('sueldopro',SueldoproController::class)->middleware('auth');
   route::resource('detallesupro',DetallesuproController::class)->middleware('auth');
   route::resource('periodo',PeriodoController::class)->middleware('auth');
   route::resource('aula',AulaController::class)->middleware('auth');
   route::resource('materia',MateriaController::class)->middleware('auth');       
   route::resource('asignarproma',AsignarpromaController::class)->middleware('auth');
   route::resource('alumno',AlumnoController::class)->middleware('auth');
   route::resource('inscripcion',InscripcionController::class)->middleware('auth');
   route::resource('actividad',ActividadController::class)->middleware('auth');
   //route::get('/register','auth.register')->name('register');
   Route::get('/registroEmpleado', [App\Http\Controllers\Auth\RegisterController::class, 'formularioEmpleado'])->name('formularioEmpleado')->middleware('auth');
   Route::post('/registroEmpleado', [App\Http\Controllers\Auth\RegisterController::class, 'registrarEmpleado'])->name('registroEmpleado')->middleware('auth');
});*/








//route::get('/home',[ProfesorController::class,'index'])->name('home');
//route::get('/home',[SueldoproController::class,'index'])->name('home');
        //route::resource('/profesor/sueldorpo/',MyClass::class)->middleware('auth');
        //route::get('/profesor/sueldorpo',[MyClass::class,'sueldorpo'])->name('home');