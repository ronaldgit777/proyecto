<?php

use App\Custom\MyClass;
use App\Http\Controllers\AsignarpromaController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\DetallesuproController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\SueldoproController;
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
*/


Route::get('/', function () {
    return view('auth.login');
});
Route::get('/profesor', function () {
    return view('profesor.hola');
});

Auth::routes();

//route::get('/home',[ProfesorController::class,'index'])->name('home');
//route::get('/home',[SueldoproController::class,'index'])->name('home');


    //route::get('/',[ProfesorController::class,'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //abre el formulario de registro de usuario
         
        route::resource('profesor',ProfesorController::class)->middleware('auth');
        //route::resource('/profesor/sueldorpo/',MyClass::class)->middleware('auth');
        //route::get('/profesor/sueldorpo',[MyClass::class,'sueldorpo'])->name('home');
        route::resource('sueldopro',SueldoproController::class)->middleware('auth');
        route::resource('detallesupro',DetallesuproController::class)->middleware('auth');
        route::resource('materia',MateriaController::class)->middleware('auth');
        route::resource('periodo',PeriodoController::class)->middleware('auth');
        route::resource('aula',AulaController::class)->middleware('auth');
        route::resource('asignarproma',AsignarpromaController::class)->middleware('auth');
        route::view('/register','auth.register')->name('register')->middleware('auth');

       

//route::get('/home',[ProfesorController::class,'index'])->name('home');
//route::get('/home',[SueldoproController::class,'index'])->name('home');


