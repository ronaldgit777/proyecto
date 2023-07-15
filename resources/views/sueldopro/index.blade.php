@extends('layouts.panel')

@section('content')
<div class="container">
  <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">LISTA DE PAGO DE SUELDOS DE LOS PROFESORES
                      <i class="fas fa-donate text-blue"></i> 
                  </h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('sueldopro/create') }}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i> registrar nuevo pago</a>
                </div>
              </div>
            </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                             <th>#</th>
                            <th scope="col"> fechadesueldo</th>
                            <th scope="col"> mesdepago</th>
                            <th scope="col">sueldo</th>
                            <th scope="col">totaldescuento</th>
                            <th scope="col">totalpago</th>
                            <th scope="col">observacion</th>
                            <th scope="col">profesor_id</th>
                            <th scope="col">acciones</th>
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
                            </td>
                        </tr>
                @endforeach
            </tbody>
          </table>
        </div>
   </div>
</div>
@endsection