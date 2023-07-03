@extends('layouts.app')

@section('content')
<div class="container">
        editar
        <form method="post" action="{{ url('/profesor/'.$profesor->id)}}" enctype="multipart/form-data">
        @csrf    
        {{ method_field('PATCH')}}
            <label for="fechadeingreso">fechadeingreso</label>
            <input type="date" name="fechadeingreso" id="fechadeingreso" value="{{ $profesor->fechadeingreso }}" class="form-control">
            <br>
            <label for="ci">ci</label>
            <input type="text" name="ci" id="ci" value="{{ $profesor->ci }}" class="form-control"> 
            <br>
            <label for="nombre">nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ $profesor->nombre }}" class="form-control">
            <br>
            <label for="apellidopaterno">apellidopaterno</label>
            <input type="text" name="apellidopaterno" id="apellidopaterno" value="{{ $profesor->apellidopaterno }}" class="form-control">
            <br>
            <label for="apellidomaterno">apellidomaterno</label>
            <input type="text" name="apellidomaterno" id="apellidomaterno" value="{{ $profesor->apellidomaterno }}" class="form-control">
            <br>
            <label for="celular">celular</label>
            <input type="text" name="celular" id="celular" value="{{ $profesor->celular }}" class="form-control">
            <br>
            <label for="direccion">direccion</label>
            <input type="text" name="direccion" id="direccion" value="{{ $profesor->direccion }}" class="form-control">
            <br>
            <label for="correo">correo</label>
            <input type="text" name="correo" id="correo" value="{{ $profesor->correo }}" class="form-control">
            <br>
            <label for="estado">estado</label>
            <input type="text" name="estado" id="estado" value="{{ $profesor->estado }}" class="form-control">
            <br>
            <label for="imagen">imagen</label>
            <img src="{{asset('storage').'/'.$profesor->imagen }}" alt=""  width="50px" class="img-thumbnail img-fluid" >
            <input type="file" name="imagen" id="imagen" class="form-control">
            <br>
            <input type="submit" value="guardar datos">
            <a href="{{ url('profesor/')}}" >regresar</a>
        </form>
</div>
@endsection