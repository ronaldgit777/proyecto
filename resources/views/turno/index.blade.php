@extends('layouts.panel')

@section('content')
<div class="container">
  <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">LISTA DE TURNOS
                    <i class="fas fa-university text-blue"></i> 
                </h3>
              </div>
              <div class="col text-right">
                <a href="{{ url('turno/create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> registrar nueva turno</a>
              </div>
            </div>
          </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>turno</th>
                <th>estado</th>
                <th>acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($turnos as $turno)
                <tr>
                    <td>{{ $turno->id }}</td>
                    <td>{{ $turno->turno }}</td>
                    <td>{{ $turno->estado }}</td>
                    <td>
                    <a href="{{ url('/turno/'.$turno->id.'/edit') }}" method="post">editar</a>//
                    <a href="{{ url('/turno/'.$turno->id.'/') }}" method="post">ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
   </div>
</div>
@endsection