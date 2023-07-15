@extends('layouts.panel')

@section('content')
<div class="container">
    <div class="card shadow">
                        <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                            <h3 class="mb-0">LISTA DE ASIGNACION--
                                <i class="far fa-calendar-alt  text-blue"></i> 
                            </h3>
                            
                            </div>
                            <div class="col text-right">
                            </div>
                        </div>
                        </div>
                    <div  class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>profesor_id</th>
                            <th>materia_id</th>
                            <th>aula_id</th>
                            <th>periodo_id</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asignarpromas as $asignarproma)
                        <tr>
                            <td>{{ $asignarproma->id }}</td>
                            <td>{{ $asignarproma->profesor->nombre."-".$asignarproma->profesor->apellidopaterno }}</td>
                            <td>{{ $asignarproma->materia->materia }}</td>
                            <td>{{ $asignarproma->aula->aula }}</td>
                            <td>{{ $asignarproma->periodo->periodo }}</td>
                            <td> <a href="{{ url('/asignarproma/'.$asignarproma->id.'/show') }}" method="post">ver</a>
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