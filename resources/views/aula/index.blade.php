@extends('layouts.panel')

@section('content')
<div class="container">
  <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">LISTA DE AULAS
                    <i class="fas fa-university text-blue"></i> 
                </h3>
              </div>
              <div class="col text-right">
                <a href="{{ url('aula/create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> registrar nueva aula</a>
              </div>
            </div>
          </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>aula</th>
                <th>estado</th>
                <th>acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($aulas as $aula)
                <tr>
                    <td>{{ $aula->id }}</td>
                    <td>{{ $aula->aula }}</td>
                    <td>{{ $aula->estado }}</td>
                    <td>
                    <a href="{{ url('/aula/'.$aula->id.'/edit') }}" method="post">editar</a>//
                    <a href="{{ url('/aula/'.$aula->id.'/') }}" method="post">ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
   </div>
</div>
@endsection