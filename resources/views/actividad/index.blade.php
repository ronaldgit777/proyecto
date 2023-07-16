@extends('layouts.panel')

@section('content')
<div class="container">
    <div class="card shadow">
                        <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                            <h3 class="mb-0">LISTA DE ACTIVIDADES
                                <i class="far fa-calendar-alt  text-blue"></i> 
                            </h3>
                            </div>
                            <div class="col text-right">
                            <a href="{{ url('actividad/create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> registrar nueva actividad</a>
                            </div>
                        </div>
                        </div>
                    <div  class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>actividad</th>
                                    <th>estado</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($actividads as $actividad)
                                <tr>
                                    <td>{{ $actividad->id }}</td>
                                    <td>{{ $actividad->actividad }}</td>
                                    <td>{{ $actividad->estado }}</td>
                                    <td>
                                        <a href="{{ url('/actividad/'.$actividad->id.'/edit') }}" method="post" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                            editar</a>//
                                          <a href="{{ url('/actividad/'.$actividad->id.'/') }}" method="post" class="btn btn-sm btn-danger">
                                            <i class="far fa-eye"></i>
                                            ver</a> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
         </div>
</div>
@endsection