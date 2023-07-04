@extends('layouts.panel')

@section('content')
<div class="container">
          <div class="row mt-3">
              <div  class="col-md-4 offset-md-4">
                <div  class="d-grid mx-auto">
                    <a href="{{ url('sueldopro/create') }}" class="btn btn-primary">falta registrar detalle sueldo</a>
                   
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
                            <th>fechadesupre</th>
                            <th>tipo</th>
                            <th>monto</th>
                            <th>observacion</th>
                            <th>sueldopro_id</th>
                            <th>profesor_id</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detallesupros as $detallesupro)
                        <tr>
                            <td>{{ $detallesupro->id }}</td>
                            <td>{{ $detallesupro->fechadetallesupro }}</td>
                            <td>{{ $detallesupro->tipo }}</td>
                            <td>{{ $detallesupro->monto }}</td>
                            <td>{{ $detallesupro->observacion }}</td>
                            <td>{{ $detallesupro->sueldopro->mesdepago }}</td>
                            <td></td>
                            <td> <a href="{{ url('/detallesupro/'.$detallesupro->id.'/show') }}" method="post">ver</a>
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