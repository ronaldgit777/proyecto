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
                            <label class="text-primary text-capitalize">profesores</label>
                              <select type="text" name="profesor_id" id="profesor_id" class="form-control" >
                                <option selected  value="">seleccione el profesor</option>
                                @foreach ($profesors as $profesor)
                                <option value="{{ $profesor->id }}">{{ $profesor->nombre." ".$profesor->apellidopaterno." ".$profesor->apellidomaterno}}</option>
                                @endforeach
                            </select> 
                            {{-- <input type="text" name="profesor_id" id="profesor_id" class="form-control" > --}}
                          </div>
                          <div class="col">
                            <label class="text-primary text-capitalize">materia</label>
                            <select type="text" name="materia_id" id="materia_id" class="form-control" >
                              <option selected value="">seleccione la materia</option>
                              @foreach ($materias as $materia)
                              <option value="{{ $materia->id }}">{{ $materia->materia}}</option>
                              @endforeach
                          </select>
                          {{-- <input type="text" name="materia_id" id="materia_id" class="form-control" > --}}
                          </div>
                          <div class="col">
                            <label class="text-primary text-capitalize">aula</label>
                            <select type="text" name="aula_id" id="aula_id" class="form-control" >
                              <option selected  value="">seleccione el aula</option>
                              @foreach ($aulas as $aula)
                              <option value="{{ $aula->id }}">{{ $aula->aula }}</option>
                              @endforeach
                          </select>
                          {{-- <input type="text" name="aula_id" id="aula_id" class="form-control" > --}}
                          </div>
                          <div class="col">
                            <label class="text-primary text-capitalize">periodo</label>
                            <select type="text" name="periodo_id" id="periodo_id" class="form-control" >
                              <option selected  value="">seleccione el periodo</option>
                              @foreach ($periodos as $periodo)
                              <option value="{{ $periodo->id }}">{{ $periodo->periodo }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-danger btn-sm" type="button" onclick="generarpdflistaprofesor()"><i class="fas fa-print"></i>imprimir</button>
                            <a href="{{url('reporopciones')}}" class="btn btn-sm btn-success" >
                            <i class="fas fa-plus-circle"></i>
                            regresar</a>
                        </div>  
                </div>
                <div class="row">
                    <div class="col">
                        <label class="text-primary text-capitalize">nombre_alumno</label>
                        <select type="text" name="alumno_id" id="alumno_id" class="form-control" >
                          <option selected  value="">seleccione el nombre del alumno</option>
                          @foreach ($alumnosapeno as $alumnonom)
                          <option value="{{ $alumnonom->nombre }}">{{ $alumnonom->nombre }}</option>
                          @endforeach
                      </select>
                    </div>
                     <div class="col">
                        <label class="text-primary text-capitalize">apepaterno_alumno</label>
                        <select type="text" name="alumnopa" id="alumnopa" class="form-control" >
                          <option selected  value="">seleccione el apellidopaterno</option>
                          @foreach ($alumnosapepa as $alumnopa)
                          <option value="{{ $alumnopa->apellidopaterno }}">{{ $alumnopa->apellidopaterno }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col">
                        <label class="text-primary text-capitalize">apematerno_alumno</label>
                        <select type="text" name="alumnoma" id="alumnoma" class="form-control" >
                          <option selected  value="">seleccione el nombre del alumno</option>
                          @foreach ($alumnosapema as $alumnoma)
                          <option value="{{ $alumnoma->apellidomaterno }}">{{ $alumnoma->apellidomaterno }}</option>
                          @endforeach
                      </select>
                    </div> 
                    <div class="col">
                        <label class="text-primary text-capitalize">estado</label>
                          <select type="text" name="estado" id="estado" class="form-control">
                            <option selected  value="">seleccione el estado</option>
                            <option value="activo">activo</option> 
                            <option value="inactivo">inactivo</option> 
                            </select>
                      </div>
                    <div class="col">
                        <label class="text-primary text-capitalize">ordenar</label>
                        <div class="input-group">
                          <select type="text" name="ordenar" id="ordenar" class="form-control">
                            <option value="profesor_nombre">profesor</option> 
                            <option value="materia_nombre">materia</option> 
                            <option value="aula_nombre">aula</option> 
                            <option value="periodo_nombre">periodo</option> 
                            <option value="alumno_nombre">nombre_alumno</option> 
                            <option value="alumno_apellidopaterno">apellido paterno_alumno</option> 
                            <option value="alumno_apellidomaterno">apellido materno_alumno</option> 
                       
                            </select>
                            <div class="input-group-append">
                              <select type="text" name="mayorymenor" id="mayorymenor" class="form-control">
                                <option value="desc">desc</option> 
                                <option value="asc">asc</option> 
                                </select>
                            </div>
                        </div>
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
                                    <th>alumno_pa</th>
                                    <th>alumno_ma</th>
                                    <th>estado</th>
                                    {{-- <th>acciones</th> --}}
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
                                    <td>{{ $inscripcion->alumno_apellidopaterno}}</td>
                                    <td>{{ $inscripcion->alumno_apellidomaterno}}</td>
                                    <td>{{ $inscripcion->estado }}</td>
                                    {{-- <td> <a href="{{ url('/inscripcion/'.$inscripcion->id.'/show') }}" method="post" class="btn btn-sm btn-danger">
                                        <i class="far fa-eye"></i></a>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
   <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/pdfmake.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/vfs_fonts.js"></script>
   <script>
    $(document).ready(function() {
  
        $('#fechainicio').on('change', function() {
  
            var fecha_ini = $(this).val(); 
            var fecha_fin = $('#fechafinal').val();
            var profesorid = $('#profesor_id').val();
            var materiaid = $('#materia_id').val();
            var periodoid = $('#periodo_id').val();
            var aulaid = $('#aula_id').val(); 
            var alumnoid = $('#alumno_id').val();  var alumnoidpa = $('#alumnopa').val(); var alumnoidma = $('#alumnoma').val(); 
            var estado = $('#estado').val(); 
            var ordenar = $('#ordenar').val();
            var mayorymenor = $('#mayorymenor').val();
            generartabla(fecha_ini,fecha_fin,profesorid,materiaid,periodoid,aulaid,alumnoid,ordenar,mayorymenor,alumnoidpa,alumnoidma,estado);   
           // alert(profesorid)   
        });
        function generartabla(fecha_ini,fecha_fin,profesorid,materiaid,periodoid,aulaid,alumnoid,ordenar,mayorymenor,alumnoidpa,alumnoidma,estado) {
        //  alert(alumnoidma)
              $.ajax({
                    url: '{{ url("obtener-fechainicioinscripcionesreporte") }}', // Ruta a tu controlador Laravel
                    type: 'POST',
                    data: {
                        fechainicio: fecha_ini, //lo de blanco es la llave q tienes para q se capture la variable
                        fechafinal: fecha_fin,
                        profesorid: profesorid,// Enviar el ID del aula seleccionada
                        materiaid: materiaid,
                        periodoid: periodoid,
                        aulaid: aulaid,
                        alumnoid: alumnoid,  alumnoidpa:alumnoidpa,     alumnoidma:alumnoidma,
                        estadosecre:estado,
                        ordenarins:ordenar,
                        mayorymenorins:mayorymenor,
                      // profesor_id: profesorId,
                        _token: '{{ csrf_token() }}' // Agregar el token CSRF
                    },
                    success: function(response) {
                        // Limpiar el campo de selección de periodos
                        $('#tabla_ins').empty();
                      // profesorreporte=[];
                        $.each(response, function(key, value) {
                            // alert(value.id)
                            $('#tabla_ins').append(
                                '<tr>'+
                                // ' <td>'+value.id+'</td>'+
                                    '<td>'+value.fechadeinscripcion+'</td>'+
                                    '<td>'+value.asignarproma_id+'</td>'+
                                    ' <td>'+value.profesor_nombre+'</td>'+
                                    ' <td>'+value.materia_nombre+'</td>'+
                                    ' <td>'+value.materia_costo+'</td>'+
                                    ' <td>'+value.periodo_nombre+'</td>'+
                                    ' <td>'+value.aula_nombre+'</td>'+
                                    ' <td>'+value.alumno_nombre+'</td>'+
                                    ' <td>'+value.alumno_apellidopaterno+'</td>'+
                                    ' <td>'+value.alumno_apellidomaterno+'</td>'+
                                    ' <td>'+value.estado+'</td>'+
                                   // ' <td>'+value.role+'</td>'+
                                    // ' <td>'+
                                    //   '<a href="/proyecto/public/inscripcion/' + value.id + '/show" method="post" class="btn btn-sm btn-danger"> <i class="far fa-eye"></i></a>'+
                                    // ' </td>'+
                                ' </tr>'
                            );
                            //alert(value.id);
                           // profesorreporte.push(encontrarListaPorId(value.id)); //añadiendo elemtos a la nueva variable
                           // $('#miadelanto').find('td').css('border', '1px solid black');
                        });
                    }
                });
        }
        $('#fechafinal').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#profesor_id').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#materia_id').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#periodo_id').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#aula_id').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#alumno_id').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#alumnoma').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#alumnopa').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#estado').on('change', function() {
           $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
        });
        $('#ordenar').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#mayorymenor').on('change', function() {
           $('#fechainicio').trigger('change');
        });
    });
  </script>
@endsection
