@extends('layouts.panel')

@section('content')
    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                      <div class="col">
                                        <h3 class="mb-0">REPORTE LISTA DE ADELANTOS DEL PROFESOR
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
                                                      <option value="{{ $profesor->id }}">{{ $profesor->nombre}}</option>
                                                      @endforeach
                                                    </select>
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
                                                    <div class="col">
                                                      <label class="text-primary text-capitalize">ordenar</label>
                                                      <div class="input-group">
                                                          <select type="text" name="ordenar" id="ordenar" class="form-control">
                                                            <option value="fechaadelantopro">fecha</option> 
                                                            <option value="nombre_profesor">nombre_profesor</option> 
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
                                                <div class="col text-right">
                                                  <button class="btn btn-danger btn-sm" type="button"><i class="fas fa-print"></i>imprimir</button>
                                                    <a href="{{url('reporopciones')}}" class="btn btn-sm btn-success" >
                                                        <i class="fas fa-plus-circle"></i>
                                                        regresar</a>
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
                                @foreach ($adelantopros as $adelantopro)
                                <tr>
                                    {{-- <td>{{ $adelantopro->id }}</td> --}}
                                    <td>{{ $adelantopro->fechaadelantopro }}</td>
                                    <td>{{ $adelantopro->monto }}</td>
                                    <td>{{ $adelantopro->estadoade }}</td>
                                    <td>{{ $adelantopro->observacion }}</td>
                                    <td>{{ $adelantopro->profesor_id ."-".$adelantopro->profesor->nombre}}</td>
                                    <td> <a href="{{ url('/adelantopro/'.$adelantopro->id.'/show') }}" method="post" class="btn btn-sm btn-danger"><i class="far fa-eye"></i></a>
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
          var profesorid = $('#profesor_id').val();  
          var monto1 = $('#monto1').val(); 
          var monto2 = $('#monto2').val(); 
          var ordenaradepro = $('#ordenar').val();
            var mayorymenoradepro = $('#mayorymenor').val();
          generartabla(fecha_ini,fecha_fin,profesorid,monto1,monto2,ordenaradepro,mayorymenoradepro);      
       
      });
      function generartabla(fecha_ini,fecha_fin,profesorid,monto1,monto2,ordenaradepro,mayorymenoradepro) {
            $.ajax({
                 url: '{{ url("obtener-fechainicioproadereporte") }}', // Ruta a tu controlador Laravel
                  type: 'POST',
                  data: {
                      fechainicio: fecha_ini, //lo de blanco es la llave q tienes para q se capture la variable
                      fechafinal: fecha_fin,
                      profesorid: profesorid,// Enviar el ID del aula seleccionada
                      monto1: monto1,
                      monto2: monto2,
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
                                  '<td>'+value.fechaadelantopro+'</td>'+
                                  ' <td>'+value.monto+'</td>'+
                                  ' <td>'+value.estadoade+'</td>'+
                                  ' <td>'+value.observacion+'</td>'+
                                  '<td>'+value.nombre_profesor+'</td>'+
                                  ' <td>'+
                                    // '<a href="/proyecto/public/profesor/' + value.id + '/edit" method="post" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i></a>' +
                                    '<a href="/proyecto/public/profesor/' + value.id + '/" method="post" class="btn btn-sm btn-danger"> <i class="far fa-eye"></i></a>'+
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
      $('#profesor_id').on('change', function() {
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
      $('#ordenar').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#mayorymenor').on('change', function() {
           $('#fechainicio').trigger('change');
        });
  });
</script>

<script>
    var adelantoprosData = {!! json_encode($adelantopros) !!};
    function generarpdflistaadelantopro() {
    // Construir el contenido del reporte utilizando los datos de adelantoprosData
    const filas = [];
    filas.push(['#', 'Fecha de Adelanto', 'Monto', 'Observación', 'Profesor']);
    for (let i = 0; i < adelantoprosData.length; i++) {
      const adelantopro = adelantoprosData[i];
      const id = adelantopro.id;
      const fechaadelantopro = adelantopro.fechaadelantopro;
      const monto = adelantopro.monto;
      const observacion = adelantopro.observacion;
      const profesor_id = adelantopro.profesor_id + "-" + adelantopro.profesor.nombre;
      filas.push([id, fechaadelantopro, monto, observacion, profesor_id]);
    }
   

    // Definir la estructura del documento PDF con estilos para la tabla
    const docDefinition = {
      content: [
        { text: 'Lista de Adelantos del Profesor', style: 'header' },
        {
          table: {
            headers: ['#', 'Fecha de Adelanto', 'Monto', 'Observación', 'Profesor'],
            body: filas,
          },
          // Estilo para la cabecera de la tabla
          headerRows: 1,
          fillColor: '#2c6aa6', // Color de fondo azul para la cabecera
        },
      ],
      styles: {
        header: { fontSize: 18, bold: true, margin: [0, 0, 0, 10] },
      },
      // Estilo para las celdas del cuerpo de la tabla
      defaultStyle: { fillColor: '#bdd7e7' }, // Color de fondo azul claro para las celdas
    };

    // Generar el documento PDF
    pdfMake.createPdf(docDefinition).download('reporte_adelantos.pdf');
  }
</script>
@endsection
