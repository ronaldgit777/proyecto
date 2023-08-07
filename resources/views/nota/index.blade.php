@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">LISTA DE INSCRIPCIONES
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
                        <div class="col">
                          <label class="text-primary text-capitalize">Buscar</label>
                          <div class="input-group">
                            <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Ingrese término de búsqueda">
                             <!--  <div class="input-group-append">
                                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i>Buscar</button>
                              </div>  -->
                          </div>
                        </div>
                        <div class="col text-right">
                          <button class="btn btn-danger" type="button"><i class="fas fa-print"></i>imprimir</button>
                          <a href="{{url('nota/create')}}" class="btn  btn-primary text-capitalize" > <i class="fas fa-plus-circle"></i> agregar nueva nota</a>
                      </div>  
                </div>
            </div>
        </div>
    </div>
                    <div  class="table-responsive">
                        <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                <tr>
                                    {{-- <th>#</th> --}}
                                    <th>fechadenota</th>
                                    <th>actividad_id</th>
                                    <th>alumno_id</th>
                                    <th>materia_id</th>
                                    <th>nota</th>
                                    <th>estado</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tabla_ins">
                                @foreach ($notas as $nota)
                                <tr>
                                    {{-- <td>{{ $inscripcion->id }}</td> --}}
                                <!--  <td> /* $inscripcion->asignarproma->materia->materia."--".$inscripcion->asignarproma->profesor->user->name}} */</td>-->
                              
                                    <td>{{ $nota->fechadenota}}</td>
                                    <td>{{ $nota->actividad_id}}</td>
                                    <td>{{ $nota->alumno_id}}</td>
                                    <td>{{ $nota->materia_id}}</td>
                                    <td>{{ $nota->nota}}</td>
                                    <td>{{ $nota->estado}}</td>
                                    <td> <a href="{{ url('/nota/'.$nota->id.'/show') }}" method="post" class="btn btn-sm btn-danger">
                                        <i class="far fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
</div>
@endsection