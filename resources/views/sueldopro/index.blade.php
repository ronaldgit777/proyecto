@extends('layouts.panel')

@section('content')
<div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">LISTA DE PAGOS DE LOS PROFESORES
                        <i class="far fa-calendar-alt  text-blue"></i> 
                    </h3>
                    <div class="row">
                            <div class="col">
                                <label class="text-primary text-capitalize">fecha de inicioA</label>
                                <input type="date" name="fechainicio" id="fechainicio" class="form-control" >
                                <span class="text-muted">desde</span>
                            </div>
                            <div class="col">
                                <label class="text-primary text-capitalize">fecha de final</label>
                                <input type="date" name="fechafinal" id="fechafinal" class="form-control">
                                <span class="text-muted">hasta</span>
                            </div>
                            <div class="col-md-4">
                              <label class="text-primary text-capitalize">Buscar</label>
                              <div class="input-group">
                                <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Ingrese término de búsqueda">
                                 <!--  <div class="input-group-append">
                                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i>Buscar</button>
                                  </div>  -->
                              </div>
                            </div>
                            <div class="col">
                              <label class="text-primary text-capitalize"></label><br>
                              <button class="btn btn-danger" type="button"><i class="fas fa-print"></i>imprimir</button>
                            </div>  
                            
                            <div class="col">
                                <label class="text-primary text-capitalize"></label> 
                                <a href="{{url('sueldopro/create')}}" class="btn  btn-primary text-capitalize" >
                                    <i class="fas fa-plus-circle"></i>
                                    agregar nuevo pago</a>
                            </div>
                            <div class="col text-right">
                                <a href="{{url('home')}}" class="btn btn-sm btn-success" >
                                    <i class="fas fa-plus-circle"></i>
                                    regresar</a>
                          </div>  
                    </div>
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
                            <td>{{ $sueldopro->profesor->sueldo }}</td>
                            <td>{{ $sueldopro->totaldescuento }}</td>
                            <td>{{ $sueldopro->totalpago }}</td>
                            <td>{{ $sueldopro->observacion }}</td>
                            <td>{{ $sueldopro->profesor->nombre }}</td>
                            <td> <a href="{{ url('/sueldopro/'.$sueldopro->id.'/show') }}" method="post">imprimir</a>
                            </td>           
                            </td>
                        </tr>
                @endforeach
            </tbody>
          </table>
        </div>
</div>
@endsection
