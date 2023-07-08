@extends('layouts.panel')

@section('content')
  <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">LISTA DE TODOS LOS ALUMNOS</h3>
              </div>
              <div class="col text-right">
                <a href="{{url('alumno/create')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus-circle"></i>
                NUEVO ALUMNO</a>
              </div>
            </div>
          </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">id</th>
                <th scope="col">fechadeingreso</th>
                <th scope="col">ci</th>
                <th scope="col">nombre</th>
                <th scope="col">apellidopaterno</th>
                <th scope="col">apellidomaterno</th>
                <th scope="col">celular</th>
                <th scope="col">direccion</th>
                <th scope="col">correo</th>
                <th scope="col">estado</th>
                <th scope="col">imagen</th>
                <th scope="col">acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($alumnos as $alumno)
                        <tr>
                            <td scope="row">{{ $alumno->id }}</td>
                            <td>{{ $alumno->fechadeingreso }}</td>
                            <td>{{ $alumno->ci }}</td>
                            <td>{{ $alumno->nombre }}</td>
                            <td>{{ $alumno->apellidopaterno }}</td>
                            <td>{{ $alumno->apellidomaterno }}</td>
                            <td>{{ $alumno->celular }}</td>
                            <td>{{ $alumno->direccion }}</td>
                            <td>{{ $alumno->correo }}</td>
                            <td>{{ $alumno->estado }}</td>
                            <td>
                            <img src="{{ asset('storage').'/'.$alumno->imagen}}" alt=""  width="50px" height="50px"  class="img-thumbnail img-fluid">
                            </td>
                            <td>
                            <a href="{{ url('/alumno/'.$alumno->id.'/edit') }}" method="post" class="btn btn-sm btn-primary">
                              <i class="fas fa-edit"></i>
                              editar</a>//
                            <a href="{{ url('/alumno/'.$alumno->id.'/') }}" method="post" class="btn btn-sm btn-danger">
                              <i class="far fa-eye"></i>
                              ver</a>     
                                                
                            </td>
                        </tr>
                        @endforeach
            </tbody>
          </table>
        </div>
   </div>
@endsection
