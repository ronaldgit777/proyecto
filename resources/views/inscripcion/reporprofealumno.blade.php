@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">REPORTE LISTA DE INSCRIPCIONES
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
                          <a href="{{url('inscripcion/create')}}" class="btn  btn-primary text-capitalize" > <i class="fas fa-plus-circle"></i> agregar nueva inscripcion</a>
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
                                    <th>fechadeinscripcion</th>
                                    <th>asignarproma</th>
                                    <th>profesor</th>
                                    <th>materia</th>
                                    <th>materia_costo</th>
                                    <th>periodo</th>
                                    <th>aula</th>
                                    <th>alumno_id</th>
                                    <th>estado</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tabla_ins">
                                @foreach ($inscripcions as $inscripcion)
                                <tr>
                                    {{-- <td>{{ $inscripcion->id }}</td> --}}
                                <!--  <td> /* $inscripcion->asignarproma->materia->materia."--".$inscripcion->asignarproma->profesor->user->name}} */</td>-->
                              
                                    <td>{{ $inscripcion->fechadeinscripcion}}</td>
                                    <td>{{ $inscripcion->asignarproma_id}}</td>
                                    <td>{{ $inscripcion->profesor_nombre}}</td>
                                    <td>{{ $inscripcion->materia_nombre}}</td>
                                    <td>{{ $inscripcion->materia_costo}}</td>
                                    <td>{{ $inscripcion->periodo_nombre}}</td>
                                    <td>{{ $inscripcion->aula_nombre}}</td>
                                    <td>{{ $inscripcion->alumno_nombre}}</td>
                                    <td>{{ $inscripcion->estado }}</td>
                                    <td> <a href="{{ url('/inscripcion/'.$inscripcion->id.'/show') }}" method="post" class="btn btn-sm btn-danger">
                                        <i class="far fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
   <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/pdfmake.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/vfs_fonts.js"></script>

@endsection
