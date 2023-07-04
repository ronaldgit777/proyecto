@extends('layouts.panel')

@section('content')
<div class="container">
<h1 class="text-center"> LISTA DE MATERIAS</h1>
          <div class="row mt-3">
              <div  class="col-md-4 offset-md-4">
                <div  class="d-grid mx-auto">
                    <a href="{{ url('materia/create') }}" class="btn btn-primary">registrar nueva materia</a>
                   
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
</div>
@endsection