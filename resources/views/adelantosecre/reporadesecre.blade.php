@extends('layouts.panel')

@section('content')
    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                      <div class="col">
                                        <h3 class="mb-0">REPORTE LISTA DE ADELANTOS DE LAS SECRETARIAS
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
                                                  <label class="text-primary text-capitalize">monto</label>
                                                  <input type="numeric" name="monto1" id="monto1" class="form-control">
                                                  <span class="text-muted">desde</span>
                                              </div>
                                              <div class="col">
                                                <label class="text-primary text-capitalize">s</label>
                                                <input type="numeric" name="monto2" id="monto2" class="form-control">
                                                <span class="text-muted">hasta</span>
                                            </div>
                                            
                                                <div class="col text-right">
                                                  <button class="btn btn-danger btn-sm" type="button"><i class="fas fa-print"></i>imprimir</button>
                                                    <a href="{{url('opciones-reportesecre')}}" class="btn btn-sm btn-success" >
                                                        <i class="fas fa-plus-circle"></i>
                                                        regresar</a>
                                              </div>  
                                        </div>
                                        <div class="row">
                                          <div class="col">
                                            <label class="text-primary text-capitalize">secretaria</label>
                                            <select type="text" name="secretaria_id" id="secretaria_id" class="form-control" >
                                              <option selected  value="">seleccione a la secretaria </option>
                                              @foreach ($secretarias as $secretaria)
                                              <option value="{{ $secretaria->id }}">{{ $secretaria->nombre." ".$secretaria->apellidopaterno." ".$secretaria->apellidomaterno}}</option>
                                              @endforeach
                                            </select>s
                                        </div>
                                          <div class="col">
                                            <label class="text-primary text-capitalize">estado</label>
                                            <select type="text" name="estado" id="estado" class="form-control">
                                              <option selected  value="">ambos</option>
                                              <option value="pendiente">pendiente</option> 
                                              <option value="pagado">pagado</option> 
                                              </select>
                                          </div>
                                            <div class="col">
                                              <label class="text-primary text-capitalize">ordenar</label>
                                              <div class="input-group">
                                                      <select type="text" name="ordenar" id="ordenar" class="form-control">
                                                        <option value="nombre_secretaria">nombre_secretaria</option> 
                                                        <option value="monto">monto</option> 
                                                        <option value="observacion">observacion</option> 
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
                        <table id="tabla_id"  class="table align-items-center table-flush">
                            <thead class="thead-light table-primary">
                                <tr>
                                    {{-- <th>#</th> --}}
                                    <th>fechadesupre</th>
                                    <th>monto</th>
                                    <th>estado</th>
                                    <th>observacion</th>
                                    <th>profesor_id</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>
                            <tbody  id="tabla_profeade">
                                @foreach ($adelantosecres as $adelantosecre)
                                <tr>
                                    {{-- <td>{{ $adelantopro->id }}</td> --}}
                                    <td>{{ $adelantosecre->fechaadelantosecre }}</td>
                                    <td>{{ $adelantosecre->monto }}</td>
                                    <td>{{ $adelantosecre->estadoade }}</td>
                                    <td>{{ $adelantosecre->observacion }}</td>
                                    <td>{{ $adelantosecre->secretaria_id."-".$adelantosecre->secretaria->nombre}}</td>
                                    <td> <a href="{{ url('/adelantosecre/'.$adelantosecre->id.'/show') }}" method="post" class="btn btn-sm btn-danger"><i class="far fa-eye"></i></a>
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
  
        $('#fechainicio').on('change', function() {
  
            var fecha_ini = $(this).val(); 
            var fecha_fin = $('#fechafinal').val();
            var secretariaid = $('#secretaria_id').val();  
            var monto1 = $('#monto1').val(); 
            var monto2 = $('#monto2').val(); 
            var estado = $('#estado').val(); 
            var ordenaradepro = $('#ordenar').val();
              var mayorymenoradepro = $('#mayorymenor').val();
            generartabla(fecha_ini,fecha_fin,secretariaid,monto1,monto2,estado,ordenaradepro,mayorymenoradepro);      
         
        });
        function generartabla(fecha_ini,fecha_fin,secretariaid,monto1,monto2,estado,ordenaradepro,mayorymenoradepro) {
              $.ajax({
                   url: '{{ url("obtener-fechainiciosecreadereporte") }}', // Ruta a tu controlador Laravel
                    type: 'POST',
                    data: {
                        fechainicio: fecha_ini, //lo de blanco es la llave q tienes para q se capture la variable
                        fechafinal: fecha_fin,
                        secretariaid: secretariaid,// Enviar el ID del aula seleccionada
                        monto1: monto1,
                        monto2: monto2,
                        estadosecre:estado,
                        ordenaradepro:ordenaradepro,
                          mayorymenoradepro:mayorymenoradepro,
                      // profesor_id: profesorId,
                        _token: '{{ csrf_token() }}' // Agregar el token CSRF
                    },
                    success: function(response) {
                        
                  
                        // Limpiar el campo de selección de periodos
                        $('#tabla_profeade').empty();
                        //profesorreporte=[];
  
                        $.each(response, function(key, value) {
                            // alert(value.id)
                            $('#tabla_profeade').append(
                                '<tr>'+
                                // ' <td>'+value.id+'</td>'+
                                    '<td>'+value.fechaadelantosecre+'</td>'+
                                    ' <td>'+value.monto+'</td>'+
                                    ' <td>'+value.estadoade+'</td>'+
                                    ' <td>'+value.observacion+'</td>'+
                                    '<td>'+value.nombre_secretaria+'</td>'+
                                    ' <td>'+
                                      // '<a href="/proyecto/public/profesor/' + value.id + '/edit" method="post" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i></a>' +
                                      '<a href="/proyecto/public/secretaria/' + value.id + '/" method="post" class="btn btn-sm btn-danger"> <i class="far fa-eye"></i></a>'+
                                    ' </td>'+
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
        $('#secretaria_id').on('change', function() {
         // alert($(this).val())
           $('#fechainicio').trigger('change');
        });
        $('#monto1').on('input', function() {
         // alert($(this).val())
           $('#fechainicio').trigger('change');
        });
        $('#monto2').on('input', function() {
         // alert($(this).val())
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
