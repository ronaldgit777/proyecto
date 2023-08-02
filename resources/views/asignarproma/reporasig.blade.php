@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">LISTA DE ASIGNACIONES REPORTE PROFESORES</h3>
                  <div class="row">
                          <div class="col">
                              <label class="text-primary text-capitalize">fecha de inicio</label>
                              <input type="date" name="fechainicio" id="fechainicio" class="form-control" >
                              <span class="text-muted">desde</span>
                          </div>
                          <div class="col">
                              <label class="text-primary text-capitalize">fecha de final</label>
                              <input type="date" name="fechafinal" id="fechafinal" class="form-control">
                              <span class="text-muted">hasta</span>
                          </div>
                          <div class="col">
                            <label class="text-primary text-capitalize">profesor</label>
                            <input type="text" name="ci" id="ci" class="form-control">
                          </div>
                          <div class="col">
                            <label class="text-primary text-capitalize">materia</label>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                          </div>
                          <div class="col">
                            <label class="text-primary text-capitalize">aula</label>
                            <input type="text" name="apellidopaterno" id="apellidopaterno" class="form-control">
                          </div>
                          <div class="col">
                            <label class="text-primary text-capitalize">periodo</label>
                            <input type="text" name="apellidomaterno" id="apellidomaterno" class="form-control">
                          </div>
                          <div class="col">
                            <label class="text-primary text-capitalize">ordenar</label>
                            <div class="input-group">
                              <select type="text" name="ordenar" id="ordenar" class="form-control">
                                <option value="fechadeingreso">fechadeingreso</option> 
                                <option value="ci">ci</option> 
                                <option value="nombre">nombre</option> 
                                <option value="apellidopaterno">apellidopaterno</option> 
                                <option value="apellidomaterno">apellidomaterno</option> 
                                <option value="celular">celular</option> 
                                <option value="direccion">direccion</option> 
                                <option value="email">email</option> 
                                <option value="estado">estado</option> 
                                <option value="sueldo">sueldo</option> 
                                </select>
                                <div class="input-group-append">
                                  <select type="text" name="mayorymenor" id="mayorymenor" class="form-control">
                                    <option value="desc">desc</option> 
                                    <option value="asc">asc</option> 
                                    </select>
                                </div>
                            </div>
                          </div>
                            <div class="col">
                              <label class="text-primary text-capitalize">presione el boton</label><br>
                              <button class="btn btn-danger" type="button" onclick="generarpdflistaprofesor()"><i class="fas fa-print"></i>imprimir</button>
                            </div>  
                            <div class="col text-right">
                              <a href="{{url('reporopciones')}}" class="btn btn-sm btn-success" >
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