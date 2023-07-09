@extends('layouts.panel')
@section('title','registrate')
@section('content')
<div class="container" >
  <div class="card shadow card bg-secondary shadow border-0">
          <div class="card-header border-0">
              <div class="row align-items-center">
              <div class="col">
                  <h3 class="mb-0">REGISTRO DE EMPELADOS</h3>
              </div>
              <div class="col text-right">
                  <a href="{{url('profesor/')}}" class="btn btn-sm btn-success">
                      <i class="fas fa-undo"></i>
                      regresar</a>
              </div>
              </div>
          </div>


<div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
                    @if($errors->any())
                    <div class="text-center text-muted mb-2">
                        <h4>se encontro el siguent error.</h4>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first()}}
                    </div>
                @else 
                    <div class="text-center text-muted mb-4">
                        <small>ingresa tus datos</small>
                    </div>
                @endif

            <form role="form" method="POST" action="{{ route('registroEmpleado') }}" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
                  <input class="form-control" placeholder="nombre" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="correo electronico" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="contraseña" type="password" name="password" required autocomplete="new-password">
                </div>
              </div>

              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="repetir contraseña" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                    <select type="text" name="role" id="role" class="form-control">
                    <option value="profesor">profesor</option>
                    <option value="secretaria">secretaria</option>
                </select><br>  
                </div>
              </div>

              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
     <input class="form-control" placeholder="fechadeingreso" type="date" name="fechadeingreso"  >
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
     <input class="form-control" placeholder="ci" type="text" name="ci" value="{{ old('ci') }}" required autocomplete="ci" autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
     <input class="form-control" placeholder="apellidopaterno" type="text" name="apellidopaterno" value="{{ old('apellidopaterno') }}" required autocomplete="apellidopaterno" autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
     <input class="form-control" placeholder="apellidomaterno" type="text" name="apellidomaterno" value="{{ old('apellidomaterno') }}" required autocomplete="apellidomaterno" autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
     <input class="form-control" placeholder="celular" type="text" name="celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
     <input class="form-control" placeholder="direccion" type="text" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                    <select type="text" name="estado" id="estado" class="form-control">
                    <option value="activo">activo</option>
                    <option value="inactivo">inactivo</option>
                </select><br>  
                </div>
              </div>

              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
     <input class="form-control" placeholder="imagen" type="file" name="imagen"  autofocus>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">registrarseNuevaVista</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection
