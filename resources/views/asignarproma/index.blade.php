@extends('layouts.panel')

@section('content')
<div class="container">
<h1 class="text-center"> LISTA DE ASIGNACIONES DE MATERIA A PROFESORES</h1>
          <div class="row mt-3">
              <div  class="col-md-4 offset-md-4">
                <div  class="d-grid mx-auto">
                    <a href="{{ url('asignarproma/create') }}" class="btn btn-primary">ASIGNAR MATERIA A PROFESOR</a>
                   
                </div>
              </div>
          </div>  
      <div class="row mt-3">
          <div  class="">
              <div  class="table-responsive">
                <table class="table table-light table-border table-bordered table-striped ">
                    <thead class="thead-light table-primary">
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
                            <td>{{ $asignarproma->profesor->nombre }}</td>
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

<!-- $table->engine="InnoDB";
            $table->bigInteger('profesor_id')->unsigned();
            $table->bigInteger('materia_id')->unsigned();
            $table->bigInteger('aula_id')->unsigned();
            $table->bigInteger('periodo_id')->unsigned();     
            $table->foreign('profesor_id')->references('id')->on('profesors')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('cascade');
            $table->foreign('periodo_id')->references('id')->on('periodos')->onDelete('cascade'); -->