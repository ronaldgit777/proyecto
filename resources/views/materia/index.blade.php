@extends('layouts.panel')

@section('content')
<div class="container">
    <div class="card shadow">
                        <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                            <h3 class="mb-0">LISTA DE MATERIAS
                                <i class="fas fa-book  text-blue"></i> 
                            </h3>
                            </div>
                            <div class="col text-right">
                            <a href="{{ url('materia/create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> registrar nueva materia</a>
                            </div>
                        </div>
                        </div>
                    <div  class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>materia</th>
                                    <th>costo</th>
                                    <th>estado</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materias as $materia)
                                <tr>
                                    <td>{{ $materia->id }}</td>
                                    <td>{{ $materia->materia }}</td>
                                    <td>{{ $materia->costo }}</td>
                                    <td>{{ $materia->estado }}</td>
                                    <td>
                                    <a href="{{ url('/materia/'.$materia->id.'/edit') }}" method="post">editar</a>//
                                    <a href="{{ url('/materia/'.$materia->id.'/') }}" method="post">ver</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
         </div>
</div>
@endsection