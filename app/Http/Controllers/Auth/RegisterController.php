<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\profesor;
use App\Models\secretaria;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'min:2'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
     /*  $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
        $roleUser = $data['role'];
            */
       // return redirect('profesor');
    }
    protected function registrarEmpleado(Request $request)
    {
      /*  $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido' => 'required',
            // Agrega aquí más reglas de validación según tus necesidades
        ]);*/
      
        $user = User::create([
           // 'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ]);
        
        $roleUser = "App\\Models\\".$request->input('role'); //profesor::create secretaria::create
     
        $empleado = $roleUser::create([
            'fechadeingreso' => $request->input('fechadeingreso'),
            'ci' => $request->input('ci'),
            'nombre' => $request->input('nombre'),
            'apellidopaterno' => $request->input('apellidopaterno'),
            'apellidomaterno' => $request->input('apellidomaterno'),
            'celular' => $request->input('celular'),
            'direccion' => $request->input('direccion'),
            'estado' => $request->input('estado'),
            'imagen' =>$request->file('imagen')->store('uploads','public'),
            'sueldo' => $request->input('sueldo'),
            'user_id' => $user->id
        ]);

        return redirect('profesor');
    }

    public function formularioEmpleado()
    {
        return view('auth.registroEmpleado');
    }
    
    
}
//xdebug

