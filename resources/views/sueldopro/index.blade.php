@extends('layouts.panel')

@section('content')
<div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">LISTA DE PAGOS DE LOS PROFESORES
                        <i class="far fa-calendar-alt  text-blue"></i> 2
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
          <table id="tabla_id" class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                             {{-- <th>#</th> --}}
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
            <tbody id="tabla_supro">
              @foreach ($sueldopros as $sueldopro)
                        <tr>
                            {{-- <td>{{ $sueldopro->id }}</td> --}}
                            <td>{{ $sueldopro->fechadesueldo }}</td>
                            <td>{{ $sueldopro->mesdepago }}</td>
                            <td>{{ $sueldopro->profesor->sueldo }}</td>
                            <td>{{ $sueldopro->totaldescuento }}</td>
                            <td>{{ $sueldopro->totalpago }}</td>
                            <td>{{ $sueldopro->observacion }}</td>
                            <td>{{ $sueldopro->profesor->nombre }}</td>
                            <td> <a href="{{ url('/sueldopro/'.$sueldopro->id.'/show') }}" method="post"  class="btn btn-sm btn-danger"><i class="fas fa-print" ></i>
                              </a>
                            </td>           
                            </td>
                        </tr>
                @endforeach
            </tbody>
          </table>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/pdfmake.min.js"></script>
   <!-- Link to pdfmake font files -->
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
          var buscar = $('#buscar').val();  
          generartabla(fecha_ini,fecha_fin,buscar);      
       
      });
      function generartabla(fecha_ini,fecha_fin,buscar) {
            $.ajax({
                  url: '{{ url("obtener-fechainiciosupro") }}', // Ruta a tu controlador Laravel
                  type: 'POST',
                  data: {
                      fechainicio: fecha_ini, //lo de blanco es la llave q tienes para q se capture la variable
                      fechafinal: fecha_fin,
                      buscarpro: buscar,// Enviar el ID del aula seleccionada
                    // profesor_id: profesorId,
                      _token: '{{ csrf_token() }}' // Agregar el token CSRF
                  },
                  success: function(response) {
                      $('#tabla_supro').empty();
                     //profesorreporte=[];
                      $.each(response, function(key, value) {
                          // alert(value.id)
                          $('#tabla_supro').append(
                              '<tr>'+
                              // ' <td>'+value.id+'</td>'+
                                  '<td>'+value.fechadesueldo+'</td>'+
                                  ' <td>'+value.mesdepago+'</td>'+
                                  ' <td>'+value.sueldo+'</td>'+
                                  ' <td>'+value.totaldescuento+'</td>'+
                                  ' <td>'+value.totalpago+'</td>'+
                                  ' <td>'+value.observacion+'</td>'+
                                  ' <td>'+value.nombre+'</td>'+
                                  // ' <td>'+value.estado+'</td>'+
                                  ' <td>'+
                                    '<a href="/proyecto/public/sueldopro/' + value.id + '/show" method="post" class="btn btn-sm btn-danger"> <i class="fas fa-print"></i></a>'+
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
      $('#buscar').on('input', function() {
       // alert($(this).val())
         $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
      });
  });
</script>
@endsection
