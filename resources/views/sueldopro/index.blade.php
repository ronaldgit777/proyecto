@extends('layouts.panel')

@section('content')
<div class="container">
<h1 class="text-center"> LISTA DE SUELDOS</h1>
          <div class="row mt-3">
              <div  class="col-md-4 offset-md-4">
                <div  class="d-grid mx-auto">
                    <a href="{{ url('sueldopro/create') }}" class="btn btn-primary">registrar nuevo sueldo</a>
                   
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
                            <th>fechadesueldo</th>
                            <th>mesdepago</th>
                            <th>sueldo</th>
                            <th>totaldescuento</th>
                            <th>totalpago</th>
                            <th>observacion</th>
                            <th>profesor_id</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sueldopros as $sueldopro)
                        <tr>
                            <td>{{ $sueldopro->id }}</td>
                            <td>{{ $sueldopro->fechadesueldo }}</td>
                            <td>{{ $sueldopro->mesdepago }}</td>
                            <td>{{ $sueldopro->sueldo }}</td>
                            <td>{{ $sueldopro->totaldescuento }}</td>
                            <td>{{ $sueldopro->totalpago }}</td>
                            <td>{{ $sueldopro->observacion }}</td>
                            <td>{{ $sueldopro->profesor->nombre }}</td>
                            <td> <a href="{{ url('/sueldopro/'.$sueldopro->id.'/show') }}" method="post">ver</a>
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