@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center"> LISTA DE PERIODOS</h1>
          <div class="row mt-3">
              <div  class="col-md-4 offset-md-4">
                <div  class="d-grid mx-auto">
                    <a href="{{ url('periodo/create') }}" class="btn btn-primary">registrar nuevo periodo</a>
                   
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
                            <th>periodo</th>
                            <th>estado</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periodos as $periodo)
                        <tr>
                            <td>{{ $periodo->id }}</td>
                            <td>{{ $periodo->periodo }}</td>
                            <td>{{ $periodo->estado }}</td>
                            <td>
                            <a href="{{ url('/periodo/'.$periodo->id.'/edit') }}" method="post">editar</a>//
                            <a href="{{ url('/periodo/'.$periodo->id.'/') }}" method="post">ver</a>
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