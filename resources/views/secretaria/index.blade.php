@extends('layouts.panel')

@section('content')
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">LISTA DE SECRETARIAS</h3>
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
                            <label class="text-primary text-capitalize">estado</label>
                            <select type="text" name="estado" id="estado" class="form-control">
                              <option selected  value="">ambos</option>
                              <option value="activo">activo</option> 
                              <option value="inactivo">inactivo</option> 
                              </select>
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
                          <div class="col text-right">
                            {{-- <button class="btn btn-danger btn-sm" type="button"><i class="fas fa-print"></i>imprimir</button> --}}
                        </div>  
                  </div>
              </div>
      </div>
    </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table id="tabla_id"  class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                {{-- <th scope="col">id</th> --}}
                <th scope="col">fechadeingreso</th>
                <th scope="col">ci</th>
                <th scope="col">nombre</th>
                <th scope="col">apellidopaterno</th>
                <th scope="col">apellidomaterno</th>
                <th scope="col">celular</th>
                <th scope="col">direccion</th>
                <th scope="col">correo</th>
                <th scope="col">estado</th>
                <th scope="col">imagen</th>
                <th scope="col">sueldo</th>
                {{-- <th scope="col">rol</th> --}}
                <th scope="col">acciones</th>
              </tr>
            </thead>
            <tbody id="tabla_secre2">
              @foreach ($secretarias as $secretaria)
                        <tr>
                            {{-- <td scope="row">{{ $secretaria->id }}</td> --}}
                            <td>{{ $secretaria->fechadeingreso }}</td>
                            <td>{{ $secretaria->ci }}</td>
                            <td>{{ $secretaria->nombre }}</td>
                            <td>{{ $secretaria->apellidopaterno }}</td>
                            <td>{{ $secretaria->apellidomaterno }}</td>
                            <td>{{ $secretaria->celular }}</td>
                            <td>{{ $secretaria->direccion }}</td>
                            <td>{{ $secretaria->user->email }}</td>
                            <td>{{ $secretaria->estado }}</td>
                            <td>
                            <img src="{{ asset('storage').'/'.$secretaria->imagen}}" alt=""  width="50px" height="50px" class="img-thumbnail img-fluid">
                            </td>
                            <td>{{ $secretaria->sueldo }}</td>
                            {{-- <td>{{ $secretaria->user->role }}</td> --}}
                            <td>
                            <a href="{{ url('/secretaria/'.$secretaria->id.'/edit') }}" method="post" class="btn btn-sm btn-primary">
                              <i class="fas fa-edit"></i>
                              </a>
                            <a href="{{ url('/secretaria/'.$secretaria->id.'/') }}" method="post" class="btn btn-sm btn-danger">
                              <i class="far fa-eye"></i>
                              </a>     
                                                
                            </td>
                        </tr>
                        @endforeach
            </tbody>
          </table>
          {{ $secretarias->links() }}
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
          var estado = $('#estado').val();  
          generartabla(fecha_ini,fecha_fin,buscar,estado);        
       
      });
      function generartabla(fecha_ini,fecha_fin,buscar,estado) {
            $.ajax({
                  url: '{{ url("obtener-fechainiciosecre2") }}', // Ruta a tu controlador Laravel
                  type: 'POST',
                  data: {
                      fechainicio: fecha_ini, //lo de blanco es la llave q tienes para q se capture la variable
                      fechafinal: fecha_fin,
                      buscarsecre: buscar,// Enviar el ID del aula seleccionada
                      estadosecre:estado,
                    // profesor_id: profesorId,
                      _token: '{{ csrf_token() }}' // Agregar el token CSRF
                  },
                  success: function(response) {
                      
                
                      // Limpiar el campo de selección de periodos
                      $('#tabla_secre2').empty();
                     // profesorreporte=[];

                      $.each(response, function(key, value) {
                          // alert(value.id)
                          $('#tabla_secre2').append(
                              '<tr>'+
                              // ' <td>'+value.id+'</td>'+
                                  '<td>'+value.fechadeingreso+'</td>'+
                                  ' <td>'+value.ci+'</td>'+
                                  ' <td>'+value.nombre+'</td>'+
                                  ' <td>'+value.apellidopaterno+'</td>'+
                                  ' <td>'+value.apellidomaterno+'</td>'+
                                  ' <td>'+value.celular+'</td>'+
                                  ' <td>'+value.direccion+'</td>'+
                                  ' <td>'+value.email+'</td>'+
                                  ' <td>'+value.estado+'</td>'+
                                  ' <td><img src="'+value.ruta_imagen+'" alt=""  width="50px"  height="50px" class="img-thumbnail img-fluid"></td>'+
                                  ' <td>'+value.sueldo+'</td>'+
                                 // ' <td>'+value.role+'</td>'+
                                  ' <td>'+
                                    '<a href="/proyecto/public/secretaria/' + value.id + '/edit" method="post" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i></a>' +
                                    '<a href="/proyecto/public/secretaria/' + value.id + '/" method="post" class="btn btn-sm btn-danger"> <i class="far fa-eye"></i></a>'+
                                  ' </td>'+
                              ' </tr>'
                          );
                          //alert(value.id);
                       //   profesorreporte.push(encontrarListaPorId(value.id)); //añadiendo elemtos a la nueva variable
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
      $('#estado').on('change', function() {
       // alert($(this).val())
         $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
      });
  });
</script>
@endsection
