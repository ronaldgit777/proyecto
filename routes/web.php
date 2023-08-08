<?php
use App\Custom\MyClass;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignarpromaController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\AdelantoproController;
use App\Http\Controllers\AdelantosecreController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\SueldoproController;
use App\Http\Controllers\SueldosecreController;
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

        route::resource('nota',NotaController::class)->middleware('auth');   
        Route::post('/obtener-listaalumnosinscritos',[App\Http\Controllers\InscripcionController::class, 'listaalumnosinscritos'])->name('obtener-listaalumnosinscritos'); //lista de aulas
        //periodos
        route::resource('periodo',PeriodoController::class)->middleware('auth');
        Route::post('/buscar-periodos',[App\Http\Controllers\PeriodoController::class, 'buscarperiodos'])->name('buscar-periodos'); //lista de aulas
        //aulas
        route::resource('aula',AulaController::class)->middleware('auth');
        Route::post('/buscar-aulas',[App\Http\Controllers\AulaController::class, 'buscaraulas'])->name('buscar-aulas'); //lista de aulas
        //materias
        route::resource('materia',MateriaController::class)->middleware('auth');       
        Route::post('/buscar-materias',[App\Http\Controllers\MateriaController::class, 'buscarmaterias'])->name('buscar-materias'); //lista de aulas
        //alumnos
        route::resource('alumno',AlumnoController::class)->middleware('auth');
        Route::post('/obtener-fechainicioalumnos',[App\Http\Controllers\AlumnoController::class, 'obtenerfechainicioalumnos'])->name('obtener-fechainicioalumnos'); //lista de alumnos
        //asignaciones
        route::resource('asignarproma',AsignarpromaController::class)->middleware('auth');
        Route::post('/obtener-periodos', [App\Http\Controllers\AsignarpromaController::class, 'obtenerPeriodos'])->name('obtener-periodos');
        Route::post('/obtener-fechainicioasig',[App\Http\Controllers\AsignarpromaController::class, 'buscarfechainicioasignaciones'])->name('obtener-fechainicioasig'); //buscar de asignaciones
        //actividad
        route::resource('actividad',ActividadController::class)->middleware('auth');
        Route::post('/buscar-actividades',[App\Http\Controllers\ActividadController::class, 'buscaractividades'])->name('buscar-actividades'); //lista de aulas
        //inscripciones
        route::resource('inscripcion',InscripcionController::class)->middleware('auth');

        Route::post('/obtener-fechainicioinscripciones',[App\Http\Controllers\InscripcionController::class, 'buscarfechainicioinscripciones'])->name('obtener-fechainicioinscripciones'); //lista de aulas

        Route::post('/obtener-materiasdelprofesorid',[App\Http\Controllers\AsignarpromaController::class, 'obtenermateriasdelprofesorid'])->name('obtener-materiasdelprofesorid');
        Route::post('/obtener-periodosmateriaprofesor',[App\Http\Controllers\AsignarpromaController::class, 'obtenerperiodosmateriaprofesor'])->name('obtener-periodosmateriaprofesor');
        Route::post('/obtener-aulaperiodosmateriaprofesor',[App\Http\Controllers\AsignarpromaController::class, 'obteneraulaperiodosmateriaprofesor'])->name('obtener-aulaperiodosmateriaprofesor');

        Route::post('/obtener-fechainicioinscripcionesreporte',[App\Http\Controllers\InscripcionController::class, 'buscarfechainicioinscripcionesreporte'])->name('obtener-fechainicioinscripcionesreporte');

        Route::get('/reporprofealumno',[App\Http\Controllers\InscripcionController::class, 'index2'])->name('reporprofealumno');
        
        //usuarios
        Route::get('/registroEmpleado', [App\Http\Controllers\Auth\RegisterController::class, 'formularioEmpleado'])->name('formularioEmpleado')->middleware('auth');
        Route::post('/registroEmpleado', [App\Http\Controllers\Auth\RegisterController::class, 'registrarEmpleado'])->name('registroEmpleado')->middleware('auth');
        //profesor asignaciones
        Route::get('/asigpro', [App\Http\Controllers\AsignarpromaController::class, 'index2'])->name('index2')->middleware('auth');
        Route::post('/asigpro', [App\Http\Controllers\AsignarpromaController::class, 'index2'])->name('index2')->middleware('auth');
        //profesor alumnos
        Route::get('/alumpro', [App\Http\Controllers\AlumnoController::class, 'index2'])->name('index2')->middleware('auth');
        Route::post('/alumpro', [App\Http\Controllers\AlumnoController::class, 'index2'])->name('index2')->middleware('auth');
        //profesor
        route::resource('profesor', ProfesorController::class)->middleware('auth');
        route::resource('sueldopro',SueldoproController::class)->middleware('auth');
        route::resource('adelantopro',adelantoprocontroller::class)->middleware('auth');

        Route::post('/obtener-sueldoprofesor', [App\Http\Controllers\SueldoproController::class, 'obtenerSueldoProfesor'])->name('obtener-sueldoprofesor');
        Route::post('/obtener-SumatoriaAdelantos', [App\Http\Controllers\AdelantoproController::class, 'obtenersumatoriaadelantosProfesor'])->name('obtener-SumatoriaAdelantos');

        Route::post('/obtener-adelantopro', [App\Http\Controllers\SueldoproController::class, 'obtenerlistaproid'])->name('obtener-adelantopro');

        Route::post('/obtener-mesessaldopro', [App\Http\Controllers\SueldoproController::class, 'mesessaldopro'])->name('obtener-mesessaldopro');

        Route::post('/validar-montoadelanto', [App\Http\Controllers\AdelantoproController::class, 'validaradelanto'])->name('validar-montoadelanto');
        
        Route::post('/obtener-fechainicio',[App\Http\Controllers\ProfesorController::class, 'obtenerfechainicio'])->name('obtener-fechainicio'); 
        Route::post('/obtener-menorfechainicio',[App\Http\Controllers\ProfesorController::class, 'obtenermenorfechainicio'])->name('obtener-menorfechainicio');
        Route::post('/obtener-fechainicio2',[App\Http\Controllers\ProfesorController::class, 'obtenerfechainicio2'])->name('obtener-fechainicio2'); //reporte buscadir

        Route::post('/obtener-adelantodispopro', [App\Http\Controllers\AdelantoproController::class, 'adelantodispopro'])->name('obtener-adelantodispopro');//modal ver ade de ade

        Route::post('/obtener-fechainicioproade',[App\Http\Controllers\AdelantoproController::class, 'obtenerfechainicioproade'])->name('obtener-fechainicioproade');//index ade pro


        Route::post('/obtener-fechainicioproadereporte',[App\Http\Controllers\AdelantoproController::class, 'obtenerfechainicioproadere'])->name('obtener-fechainicioproadereporte');//repor adelanto pro

      

        Route::post('/obtener-fechainiciosupro',[App\Http\Controllers\SueldoproController::class, 'obtenerfechainiciosupro'])->name('obtener-fechainiciosupro');
        //reportes profesor
        Route::get('/reporopciones', [App\Http\Controllers\ProfesorController::class, 'opcionesreporte'])->name('reporopciones')->middleware('auth');
        Route::get('/repor-pro', [App\Http\Controllers\ProfesorController::class, 'reporpro'])->name('repor-pro')->middleware('auth');
        Route::get('/reporasig', [App\Http\Controllers\AsignarpromaController::class, 'reporasig'])->name('reporasig')->middleware('auth');
        Route::get('/reporadepro', [App\Http\Controllers\AdelantoproController::class, 'reporadepro'])->name('reporadepro')->middleware('auth');//ruta
        Route::get('/reporsupro', [App\Http\Controllers\SueldoproController::class, 'reporsupro'])->name('reporsupro')->middleware('auth');//ruta
        Route::post('/obtener-fechainicioasigre',[App\Http\Controllers\AsignarpromaController::class, 'buscarfechainicioasignacionesre'])->name('obtener-fechainicioasigre'); //buscar de asignaciones
       Route::post('/obtener-fechainicioprosureporte',[App\Http\Controllers\SueldoproController::class, 'obtenerfechainicioprosureporte'])->name('obtener-fechainicioprosureporte');//repor 
        //secretarias
        route::resource('secretaria',SecretariaController::class)->middleware('auth');
        route::resource('sueldosecre',SueldosecreController::class)->middleware('auth');
        route::resource('adelantosecre',AdelantosecreController::class)->middleware('auth');
        Route::post('/obtener-sueldosecretaria', [App\Http\Controllers\SueldosecreController::class, 'obtenerSueldosecretaria'])->name('obtener-sueldosecretaria');
        Route::post('/obtener-SumatoriaAdelantossecre', [App\Http\Controllers\AdelantosecreController::class, 'obtenersumatoriaadelantossecretaria'])->name('obtener-SumatoriaAdelantossecre');

        Route::post('/obtener-adelantosecre', [App\Http\Controllers\SueldosecreController::class, 'obtenerlistasecreid'])->name('obtener-adelantosecre');

        Route::post('/obtener-mesessaldosecre', [App\Http\Controllers\SueldosecreController::class, 'mesessaldosecre'])->name('obtener-mesessaldosecre');

        Route::post('/validar-montoadelantosecre', [App\Http\Controllers\AdelantosecreController::class, 'validaradelantosecre'])->name('validar-montoadelantosecre');

        Route::post('/obtener-adelantodisposecre', [App\Http\Controllers\AdelantosecreController::class, 'adelantodisposecre'])->name('obtener-adelantodisposecre');//modal ver ade de ade
        

        Route::post('/obtener-fechainiciosecre',[App\Http\Controllers\SecretariaController::class, 'obtenerfechainiciosecre'])->name('obtener-fechainiciosecre'); 
        Route::post('/obtener-menorfechainiciosecre',[App\Http\Controllers\SecretariaController::class, 'obtenermenorfechainicio'])->name('obtener-menorfechainiciosecre');
        Route::post('/obtener-fechainiciosecreade',[App\Http\Controllers\AdelantosecreController::class, 'obtenerfechainiciosecreade'])->name('obtener-fechainiciosecreade'); //reporte buscadir
        Route::post('/obtener-fechainiciosusecre',[App\Http\Controllers\SueldosecreController::class, 'obtenerfechainiciosusecre'])->name('obtener-fechainiciosusecre');
        Route::post('/obtener-fechainiciosecre2',[App\Http\Controllers\SecretariaController::class, 'obtenerfechainiciosecre2'])->name('obtener-fechainiciosecre2'); //lista de secretarias
        //reportes secretaria
        Route::get('/opciones-reportesecre', [App\Http\Controllers\SecretariaController::class, 'opcionesreportesecre'])->name('opciones-reportesecre')->middleware('auth');
        Route::get('/repor-secre', [App\Http\Controllers\SecretariaController::class, 'reporsecres'])->name('repor-secre')->middleware('auth');
        Route::get('/reporadesecre', [App\Http\Controllers\AdelantosecreController::class, 'reporadesecre'])->name('reporadesecre')->middleware('auth');//ruta
        Route::get('/reporsusecre', [App\Http\Controllers\SueldosecreController::class, 'reporsusecre'])->name('reporsusecre')->middleware('auth');//ruta
        Route::post('/obtener-fechainiciosecreadereporte',[App\Http\Controllers\AdelantosecreController::class, 'obtenerfechainiciosecreadere'])->name('obtener-fechainiciosecreadereporte');//repor adelanto pro
        
        Route::post('/obtener-fechainiciosecresureporte',[App\Http\Controllers\SueldosecreController::class, 'obtenerfechainiciosecresureporte'])->name('obtener-fechainiciosecresureporte');//repor adelanto pro

        
/*
   


Route::middleware(['auth', 'admin'])->group(function () {
    //abre el formulario de registro de usuario
   // route::resource('user',user::class)->middleware('auth');
                    route::resource('secretaria',SecretariaController::class)->middleware('auth');
                    route::resource('sueldosecre',SueldosecreController::class)->middleware('auth');
                    route::resource('adelantosecre',AdelantosecreController::class)->middleware('auth');
                    route::resource('profesor', ProfesorController::class);
                    route::resource('sueldopro',SueldoproController::class)->middleware('auth');
                    route::resource('adelantopro',adelantoprocontroller::class)->middleware('auth');
                    route::resource('periodo',PeriodoController::class)->middleware('auth');
                    route::resource('aula',AulaController::class)->middleware('auth');
                    route::resource('materia',MateriaController::class)->middleware('auth');       
                    route::resource('asignarproma',AsignarpromaController::class)->middleware('auth');
                    route::resource('alumno',AlumnoController::class)->middleware('auth');
                    route::resource('inscripcion',InscripcionController::class)->middleware('auth');
                    route::resource('actividad',ActividadController::class)->middleware('auth');
                    Route::get('/registroEmpleado', [App\Http\Controllers\Auth\RegisterController::class, 'formularioEmpleado'])->name('formularioEmpleado')->middleware('auth');
                    Route::post('/registroEmpleado', [App\Http\Controllers\Auth\RegisterController::class, 'registrarEmpleado'])->name('registroEmpleado')->middleware('auth');
                    Route::get('/asigpro', [App\Http\Controllers\AsignarpromaController::class, 'index2'])->name('index2')->middleware('auth');
                    Route::post('/asigpro', [App\Http\Controllers\AsignarpromaController::class, 'index2'])->name('index2')->middleware('auth');
                    Route::get('/alumpro', [App\Http\Controllers\AlumnoController::class, 'index2'])->name('index2')->middleware('auth');
                    Route::post('/alumpro', [App\Http\Controllers\AlumnoController::class, 'index2'])->name('index2')->middleware('auth');
                    // Route::get('/asignarproma', [App\Http\Controllers\AsignarpromaController::class, 'asigpro'])->name('asig')->middleware('auth');
                    Route::post('/obtener-periodos', [App\Http\Controllers\AsignarpromaController::class, 'obtenerPeriodos'])
                    ->name('obtener-periodos');
                    Route::post('/obtener-sueldoprofesor', [App\Http\Controllers\SueldoproController::class, 'obtenerSueldoProfesor'])
                    ->name('obtener-sueldoprofesor');
                    Route::post('/obtener-SumatoriaAdelantos', [App\Http\Controllers\AdelantoproController::class, 'obtenersumatoriaadelantosProfesor'])
                    ->name('obtener-SumatoriaAdelantos');
                    Route::post('/obtener-adelantopro', [App\Http\Controllers\SueldoproController::class, 'obtenerlistaproid'])
                    ->name('obtener-adelantopro');
                    Route::post('/obtener-mesessaldopro', [App\Http\Controllers\SueldoproController::class, 'mesessaldopro'])
                    ->name('obtener-mesessaldopro');
                    });
Route::middleware(['auth', 'secretaria'])->group(function () {
    //abre el formulario de registro de usuario
   // route::resource('user',user::class)->middleware('auth');
                route::resource('secretaria',SecretariaController::class)->middleware('auth');
                route::resource('sueldosecre',SueldosecreController::class)->middleware('auth');
                route::resource('adelantosecre',AdelantosecreController::class)->middleware('auth');

                route::resource('profesor', ProfesorController::class);
                route::resource('sueldopro',SueldoproController::class)->middleware('auth');
                route::resource('adelantopro',adelantoprocontroller::class)->middleware('auth');
                route::resource('periodo',PeriodoController::class)->middleware('auth');
                route::resource('aula',AulaController::class)->middleware('auth');
                route::resource('materia',MateriaController::class)->middleware('auth');       
                route::resource('asignarproma',AsignarpromaController::class)->middleware('auth');
                route::resource('alumno',AlumnoController::class)->middleware('auth');
                route::resource('inscripcion',InscripcionController::class)->middleware('auth');
                route::resource('actividad',ActividadController::class)->middleware('auth');
                Route::get('/registroEmpleado', [App\Http\Controllers\Auth\RegisterController::class, 'formularioEmpleado'])->name('formularioEmpleado')->middleware('auth');
                Route::post('/registroEmpleado', [App\Http\Controllers\Auth\RegisterController::class, 'registrarEmpleado'])->name('registroEmpleado')->middleware('auth');
                Route::get('/asigpro', [App\Http\Controllers\AsignarpromaController::class, 'index2'])->name('index2')->middleware('auth');
                Route::post('/asigpro', [App\Http\Controllers\AsignarpromaController::class, 'index2'])->name('index2')->middleware('auth');
                Route::get('/alumpro', [App\Http\Controllers\AlumnoController::class, 'index2'])->name('index2')->middleware('auth');
                Route::post('/alumpro', [App\Http\Controllers\AlumnoController::class, 'index2'])->name('index2')->middleware('auth');
                // Route::get('/asignarproma', [App\Http\Controllers\AsignarpromaController::class, 'asigpro'])->name('asig')->middleware('auth');
                Route::post('/obtener-periodos', [App\Http\Controllers\AsignarpromaController::class, 'obtenerPeriodos'])
                ->name('obtener-periodos');
                Route::post('/obtener-sueldoprofesor', [App\Http\Controllers\SueldoproController::class, 'obtenerSueldoProfesor'])
                ->name('obtener-sueldoprofesor');
                Route::post('/obtener-SumatoriaAdelantos', [App\Http\Controllers\AdelantoproController::class, 'obtenersumatoriaadelantosProfesor'])
                ->name('obtener-SumatoriaAdelantos');
                Route::post('/obtener-adelantopro', [App\Http\Controllers\SueldoproController::class, 'obtenerlistaproid'])
                ->name('obtener-adelantopro');
                Route::post('/obtener-mesessaldopro', [App\Http\Controllers\SueldoproController::class, 'mesessaldopro'])
                ->name('obtener-mesessaldopro');
});

//route::get('/home',[ProfesorController::class,'index'])->name('home');
//route::get('/home',[SueldoproController::class,'index'])->name('home');
        //route::resource('/profesor/sueldorpo/',MyClass::class)->middleware('auth');
        //route::get('/profesor/sueldorpo',[MyClass::class,'sueldorpo'])->name('home');
        */