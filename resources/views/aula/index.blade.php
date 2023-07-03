@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center"> LISTA DE AULAS</h1>
          <div class="row mt-3">
              <div  class="col-md-4 offset-md-4">
                <div  class="d-grid mx-auto">
                    <a href="{{ url('aula/create') }}" class="btn btn-primary">registrar nueva aula</a>
                   
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
</div>
@endsection