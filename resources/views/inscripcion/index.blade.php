@extends('layouts.panel')

@section('content')
<div class="container">
    <div class="card shadow">
                        <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                            <h3 class="mb-0">LISTA DE INSCRIPCIONES
                                <i class="far fa-calendar-alt  text-blue"></i> 
                            </h3>
                            </div>
                            <div class="col text-right">
                            <a href="{{ url('inscripcion/create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> registrar nueva inscripcion</a>
                            </div>
                        </div>
                        </div>
                    <div  class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>asignarproma</th>
                            <th>alumno_id</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inscripcions as $inscripcion)
                        <tr>
                            <td>{{ $inscripcion->id }}</td>
                          <!--  <td> /* $inscripcion->asignarproma->materia->materia."--".$inscripcion->asignarproma->profesor->user->name}} */</td>-->
                            <td>{{ $inscripcion->asignarproma->materia->materia."--".$inscripcion->asignarproma->profesor->nombre }}</td>
                            <td>{{ $inscripcion->alumno->nombre }}</td>
                            <td> <a href="{{ url('/inscripcion/'.$inscripcion->id.'/show') }}" method="post">ver</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
     </div>
</div>
@endsection
