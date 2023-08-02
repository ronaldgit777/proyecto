@extends('layouts.panel')

@section('content')
<div class="card shadow">
         <div class="card-header border-0">
                <div class="row align-items-center">
                      <div class="col">
                        <h3 class="mb-0">LISTA DE ASIGNACIONES</h3>
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
                                </div>S
                                <div class="col">
                                    <label class="text-primary text-capitalize"></label><br>
                                    <button class="btn btn-danger" type="button"><i class="fas fa-print"></i>imprimir</button>
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
                    <div  class="table-responsive">
                        <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>fecha de asignacion</th>
                                    <th>profesor_id</th>
                                    <th>materia_id</th>
                                    <th>aula_id</th>
                                    <th>periodo_id</th>
                                    <th>estado</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asignarpromas as $asignarproma)
                                <tr>
                                    <td>{{ $asignarproma->id }}</td>
                                    <td>{{ $asignarproma->fechadeasignacion }}</td>
                                    <td>{{ $asignarproma->profesor->nombre."-".$asignarproma->profesor->apellidopaterno }}</td>
                                    <td>{{ $asignarproma->materia->materia }}</td>
                                    <td>{{ $asignarproma->aula->aula }}</td>
                                    <td>{{ $asignarproma->periodo->periodo }}</td>
                                    <td>{{ $asignarproma->estado }}</td>
                                    <td> <a href="{{ url('/asignarproma/'.$asignarproma->id.'/show') }}" method="post">ver</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
</div>
@endsection