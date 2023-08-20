@extends('layouts.panel')

@section('content')
<div class="card shadow">
         <div class="card-header border-0">
                <div class="row align-items-center">
                      <div class="col">
                        <h3 class="mb-0">LISTA DE ASIGNACIONES REPORTE</h3>
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
                                <div class="col text-right">
                                  <button class="btn btn-danger btn-sm" type="button"><i class="fas fa-print"></i>imprimir</button>
                                  <a href="{{url('home')}}" class="btn btn-sm btn-success" >
                                  <i class="fas fa-plus-circle"></i>
                                  regresar</a>
                              </div>  
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="text-primary text-capitalize">periodo</label>
                                <select type="text" name="periodo_id" id="periodo_id" class="form-control" >
                                  <option selected  value="">seleccione el periodo</option>
                                  @foreach ($periodos as $periodo)
                                  <option value="{{ $periodo->id }}">{{ $periodo->periodo }}</option>
                                  @endforeach
                              </select>
                              {{-- <input type="text" name="periodo_id" id="periodo_id" class="form-control" > --}}
                              </div>
                            <div class="col">
                              <label class="text-primary text-capitalize">estado</label>
                              <select type="text" name="estado" id="estado" class="form-control">
                                <option selected value="">seleccione el esado</option>
                                <option value="activo">activo</option> 
                                <option value="inactivo">inactivo</option> 
                                </select>
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
                                  <option value="materias.materia">materias</option> 
                                  <option value="materias.costo">costo</option> 
                                  <option value="aulas.aula">aulas</option> 
                                  <option value="periodos.periodo">periodo</option> 
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
                                    <th>fecha de asignacion</th>
                                    <th>profesor_id</th>
                                    <th>materia_id</th>
                                    <th>costo</th>
                                    <th>aula_id</th>
                                    <th>periodo_id</th>
                                    <th>estado</th>
                                    {{-- <th>acciones</th> --}}
                                </tr>
                            </thead>
                            <tbody id="tabla_asigre">
                                @foreach ($asignarpromas as $asignarproma)
                                <tr>
                                    {{-- <td>{{ $asignarproma->id }}</td> --}}
                                    <td>{{ $asignarproma->fechadeasignacion }}</td>
                                    <td>{{ $asignarproma->nombre."-".$asignarproma->profesor->apellidopaterno }}</td>
                                    {{-- <td>{{ $asignarproma->profesor->nombre."-".$asignarproma->profesor->apellidopaterno }}</td> --}}
                                    <td>{{ $asignarproma->nombre_materia}}</td>
                                    <td>{{ $asignarproma->materia->costo}}</td>
                                    <td>{{ $asignarproma->nombre_aula }}</td>
                                    <td>{{ $asignarproma->nombre_periodo }}</td>
                                    <td>{{ $asignarproma->estado }}</td>
                                    {{-- <td> <a href="{{ url('/asignarproma/'.$asignarproma->id.'/show') }}" method="post">ver</a> --}}
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
   <script>
    $(document).ready(function() {
      var estiloOriginal = $('#buscar').css('border');
  
      // Cuando se produzca el evento 'click' en cualquier input
      $('input').on('click', function() {
        // Restaurar el estilo original del borde en el input "nombre"
        $('#buscar').css('border', estiloOriginal)
      });
  
        $('#fechainicio').on('change', function() {
  
            var fecha_ini = $(this).val(); 
            var fecha_fin = $('#fechafinal').val();
            var profesorid = $('#profesor_id').val();
            var materiaid = $('#materia_id').val();
            var periodoid = $('#periodo_id').val();
            var aulaid = $('#aula_id').val();  
            var estado = $('#estado').val();  
           // alert(estado);
            generartabla(fecha_ini,fecha_fin,profesorid,materiaid,periodoid,aulaid,estado); 
           
        });
        function generartabla(fecha_ini,fecha_fin,profesorid,materiaid,periodoid,aulaid,estado) {
              $.ajax({
                    url: '{{ url("obtener-fechainicioasigprofereporte") }}', // Ruta a tu controlador Laravel
                    type: 'POST',
                    data: {
                        fechainicio: fecha_ini, //lo de blanco es la llave q tienes para q se capture la variable
                        fechafinal: fecha_fin,
                        profesorid: profesorid,// Enviar el ID del aula seleccionada
                        materiaid: materiaid,
                        periodoid: periodoid,
                        aulaid: aulaid,
                        estadoasig:estado,
                      // profesor_id: profesorId,
                        _token: '{{ csrf_token() }}' // Agregar el token CSRF
                      
                    },
                    success: function(response) {
                        // Limpiar el campo de selección de periodos
                        $('#tabla_asigre').empty();
                      // profesorreporte=[];
                        $.each(response, function(key, value) {
                            // alert(value.id)
                            $('#tabla_asigre').append(
                                '<tr>'+
                                // ' <td>'+value.id+'</td>'+
                                    '<td>'+value.fechadeasignacion+'</td>'+
                                    ' <td>'+value.profesor_nombre+'</td>'+
                                    ' <td>'+value.materia_nombre+'</td>'+
                                    ' <td>'+value.materia_costo+'</td>'+
                                    ' <td>'+value.aula_nombre+'</td>'+
                                    ' <td>'+value.periodo_nombre+'</td>'+
                                    ' <td>'+value.nombre_estado+'</td>'+
                                   // ' <td>'+value.role+'</td>'+
                                    // ' <td>'+
                                    //    '<a href="/proyecto/public/asignacion/' + value.id + '/edit" method="post" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i></a>' +
                                    //   '<a href="/proyecto/public/asignacion/' + value.id + '/show" method="post" class="btn btn-sm btn-danger"> <i class="far fa-eye"></i></a>'+
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
        $('#materia_id').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#periodo_id').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#aula_id').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#ordenar').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#mayorymenor').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#estado').on('change', function() {
           $('#fechainicio').trigger('change');
        });
    });
  </script>
@endsection