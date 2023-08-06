@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">LISTA DE DATOS REPORTE PROFESORES</h3>
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
                                <label class="text-primary text-capitalize">ci</label>
                                <input type="text" name="ci" id="ci" class="form-control">
                              </div>
                              <div class="col">
                                <label class="text-primary text-capitalize">nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control">
                              </div>
                              <div class="col">
                                <label class="text-primary text-capitalize">apellido paterno</label>
                                <input type="text" name="apellidopaterno" id="apellidopaterno" class="form-control">
                              </div>
                              <div class="col">
                                <label class="text-primary text-capitalize">apellido materno</label>
                                <input type="text" name="apellidomaterno" id="apellidomaterno" class="form-control">
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
                      <div class="row">
                        <div class="col">
                            <label class="text-primary text-capitalize">celular</label>
                            <input type="text" name="celular" id="celular" class="form-control" >
                            <span class="text-muted">desde</span>
                        </div>
                        <div class="col">
                            <label class="text-primary text-capitalize">direccion</label>
                            <input type="text" name="direccion" id="direccion" class="form-control">
                            <span class="text-muted">hasta</span>
                        </div>
                        <div class="col">
                          <label class="text-primary text-capitalize">email</label>
                          <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="col">
                          <label class="text-primary text-capitalize">estado</label>
                          <input type="text" name="estado" id="estado" class="form-control">
                        </div>
                        <div class="col">
                          <label class="text-primary text-capitalize">sueldo -desde</label>
                          <input type="text" name="sueldomin" id="sueldomin" class="form-control">
                          <span class="text-muted">minimo</span>
                        </div>
                        <div class="col">
                          <label class="text-primary text-capitalize">hasta</label>
                          <input type="text" name="sueldomax" id="sueldomax" class="form-control">
                          <span class="text-muted">maximo</span>
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
                      
                      </div>
                </div>
      </div>
    </div>
  <style>
 .img-custom {
  width: 50px;
  height: 50px;
}
  </style>
  <div class="table-responsive">
    <!-- Projects table -->
    <table id="tabla" class="table align-items-center table-flush" >
      <thead class="thead-light">
        <tr>
          <th scope="col" data-column="id" class="sortable">id</th>
          <th scope="col" data-column="fechadeingreso" class="sortable">fechadeingreso</th>
          <th scope="col" data-column="ci" class="sortable">ci</th>
          <th scope="col" data-column="nombre" class="sortable">nombre</th>
          <th scope="col" data-column="apellidopaterno" class="sortable">apellidopaterno</th>
          <th scope="col" data-column="apellidomaterno" class="sortable">apellidomaterno</th>
          <th scope="col" data-column="celular" class="sortable">celular</th>
          <th scope="col" data-column="direccion" class="sortable">direccion</th>
          <th scope="col" data-column="correo" class="sortable">correo</th>
          <th scope="col" data-column="estado" class="sortable">estado</th>
          <th scope="col">imagen</th>
          <th scope="col" data-column="sueldo" class="sortable">sueldo</th>
          <th scope="col">rol</th>
        </tr>
      </thead>
      <tbody id="tabla_profe">
        @foreach ($profesors as $profesor)
                  <tr>
                      <td scope="row">{{ $profesor->id }}</td>
                      <td>{{ $profesor->fechadeingreso }}</td>
                      <td>{{ $profesor->ci }}</td>
                      <td>{{ $profesor->nombre }}</td>
                      <td>{{ $profesor->apellidopaterno }}</td>
                      <td>{{ $profesor->apellidomaterno }}</td>
                      <td>{{ $profesor->celular }}</td>
                      <td>{{ $profesor->direccion }}</td>
                      <td>{{ $profesor->user->email }}</td>
                      <td>{{ $profesor->estado }}</td>
                      <td>
                      <img src="{{ asset('storage').'/'.$profesor->imagen}}" alt="" class="img-thumbnail img-fluid img-custom">


                      </td>
                      <td>{{ $profesor->sueldo }}</td>
                      <td>{{ $profesor->user->role }}</td>
                  </tr>
                  @endforeach
      </tbody>
    </table>
    ---
    
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/pdfmake.min.js"></script>
<!-- Link to pdfmake font files -->
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/vfs_fonts.js"></script>

<script></script> 

<script>
    var profeprosData = {!! json_encode($profesors) !!};
    var profesorreporte =  {!! json_encode($profesors) !!};
    function encontrarListaPorId(idLista) {
      return profeprosData.find(item => item.id === idLista);
    }
    function generarpdflistaprofesor() {
    // Construir el contenido del reporte utilizando los datos de adelantoprosData
    const filas = [];
    filas.push(['#', 'fechadeingreso', 'ci', 'nombre', 'apellidopaterno','apellidomaterno','celular','direccion','email','estado','imagen','sueldo','role']);
    for (let i = 0; i < profesorreporte.length; i++) {
      const profesor = profesorreporte[i];
      const id = profesor.id;
      const fechadeingreso = profesor.fechadeingreso;
      const ci = profesor.ci;
      const nombre = profesor.nombre;
      const apellidopaterno = profesor.apellidopaterno;
      const apellidomaterno = profesor.apellidomaterno;
      const celular = profesor.celular;
      const direccion = profesor.direccion;
      const user_id = profesor.user_id + "-" + profesor.user.email;
      const estado = profesor.estado;
      const imagen = profesor.imagen;
    //  {  image: 'myImageDictionary/image1.jpg' }
      const sueldo = profesor.sueldo;
      const role = profesor.user.role;
      filas.push([id, fechadeingreso, ci, nombre, apellidopaterno, apellidomaterno,celular,direccion,user_id,estado,imagen,sueldo,role]);
    }
   

    // Definir la estructura del documento PDF con estilos para la tabla
    const docDefinition = {
      pageSize: {  
      width: 1000, // Ajusta el ancho de la página según tus necesidades
      height: 800, // Puedes ajustar el alto de la página según lo requieras
        },
      pageOrientation: 'landscape',
      content: [
        { text: 'Lista de Profesor', style: 'header' },
        {
          table: {
            headers: ['#', 'Fechadeingreso', 'ci', 'nombre', 'apellidopaterno','apellidomaterno','celular','direccion','correo','estado','imagen','sueldo','role'],
            body: filas,
          },
          // Estilo para la cabecera de la tabla
          headerRows: 1,
          fillColor: '#2c6aa6', // Color de fondo azul para la cabecera
        },
      ],
      styles: {
        header: { fontSize: 10, bold: true, margin: [0, 0, 0, 10] },
      },
      // Estilo para las celdas del cuerpo de la tabla
      defaultStyle: { fillColor: '#bdd7e7' }, // Color de fondo azul claro para las celdas
    };

    // Generar el documento PDF
    pdfMake.createPdf(docDefinition).download('reporte_profesores.pdf');
  }
</script>

<script>
    $(document).ready(function() {
      var estiloOriginal = $('#nombre').css('border');

      // Cuando se produzca el evento 'click' en cualquier input
      $('input').on('click', function() {
        // Restaurar el estilo original del borde en el input "nombre"
        $('#ci').css('border', estiloOriginal),$('#nombre').css('border', estiloOriginal);$('#apellidopaterno').css('border', estiloOriginal),
        $('#apellidomaterno').css('border', estiloOriginal),$('#celular').css('border', estiloOriginal);$('#direccion').css('border', estiloOriginal),
        $('#email').css('border', estiloOriginal);$('#estado').css('border', estiloOriginal);$('#sueldomin').css('border', estiloOriginal);$('#sueldomax').css('border', estiloOriginal);
        $('#ordenar').css('border', estiloOriginal);$('#mayorymenor').css('border', estiloOriginal);
      });

        $('#fechainicio').on('change', function() {

            var fecha_ini = $(this).val(); 
            var fecha_fin = $('#fechafinal').val();
            var ci = $('#ci').val();  
            var nombre = $('#nombre').val();  
            var apellidopaterno = $('#apellidopaterno').val(); 
            var apellidomaterno = $('#apellidomaterno').val(); 
            var celular = $('#celular').val(); 
            var direccion = $('#direccion').val(); 
            var email = $('#email').val(); 
            var estado = $('#estado').val();  
            var sueldomin = $('#sueldomin').val();
            var sueldomax = $('#sueldomax').val();
            var ordenar = $('#ordenar').val();
            var mayorymenor = $('#mayorymenor').val();
            generartabla(fecha_ini,fecha_fin,ci,nombre,apellidopaterno,apellidomaterno,celular,direccion,email,estado,sueldomin,sueldomax,ordenar,mayorymenor);      
          //  alert(ordenar+mayorymenor);
        });

        function generartabla(fecha_ini,fecha_fin,ci,nombre,apellidopaterno,apellidomaterno,celular,direccion,email,estado,sueldomin,sueldomax,ordenar,mayorymenor) {
              $.ajax({
                    url: '{{ url("obtener-fechainicio") }}', // Ruta a tu controlador Laravel
                    type: 'POST',
                    data: {
                        fechainicio: fecha_ini, //lo de blanco es la llave q tienes para q se capture la variable
                        fechafinal: fecha_fin,
                        cipro: ci,// Enviar el ID del aula seleccionada
                        nombrepro:nombre,
                        apellidopaternopro:apellidopaterno,
                        apellidomaternopro:apellidomaterno,
                        celularpro:celular,
                        direccionpro:direccion,
                        emailpro:email,
                        estadopro:estado,
                        sueldominpro:sueldomin,
                        ordenarpro:ordenar,
                        mayorymenorpro:mayorymenor,
                      // profesor_id: profesorId,
                        _token: '{{ csrf_token() }}' // Agregar el token CSRF
                    },
                    success: function(response) {
                        
                  
                        // Limpiar el campo de selección de periodos
                        $('#tabla_profe').empty();
                        profesorreporte=[];

                        $.each(response, function(key, value) {
                            // alert(value.id)
                            $('#tabla_profe').append(
                                '<tr>'+
                                ' <td>'+value.id+'</td>'+
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
                                    ' <td>'+value.role+'</td>'+
                                ' </tr>'
                            );
                            //alert(value.id);
                            profesorreporte.push(encontrarListaPorId(value.id)); //añadiendo elemtos a la nueva variable
                          //  $('#miadelanto').find('td').css('border', '1px solid black');
                        });
                    }
                });
        }
        $('#fechafinal').on('change', function() {
           $('#fechainicio').trigger('change');
        });
        $('#ci').on('input', function() {
         // alert($(this).val())
           $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
           $(this).val($(this).val().replace(/[^\d]/g, ''));
        });
        $('#nombre').on('input', function() {
           $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
           $(this).val($(this).val().replace(/[^a-zA-Z]/g, ''));
        });
        $('#apellidopaterno').on('input', function() {
           $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
        });
        $('#apellidomaterno').on('input', function() {
           $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
        });
        $('#celular').on('input', function() {
           $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
        });
        $('#direccion').on('input', function() {
           $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
        });
        $('#email').on('input', function() {
           $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
        });
        $('#estado').on('input', function() {
           $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
        });
        $('#sueldomin').on('input', function() {
         // alert($(this).val())
           $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
        });
        $('#sueldomax').on('input', function() {
         // alert($(this).val())
           $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
        });
        $('#ordenar').on('change', function() {
         // alert($(this).val())
           $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
        });
        $('#mayorymenor').on('change', function() {
         // alert($(this).val())
           $('#fechainicio').trigger('change');$(this).css('border', '3px solid #0000ff');
        });
        //evento keydown
          // Evento 'keydown' para el input con id "nombre"
          $('#nombre').on('keydown', function(event) {
            // Obtener el código de la tecla presionada
            var keyCode = event.keyCode || event.which;
             // Permitir las teclas "Borrar" (Eliminar o Backspace)
              if (keyCode === 8) {
                return true;
              }
             // Verificar si el código de la tecla corresponde a una letra del alfabeto (mayúscula o minúscula)
            if ((keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122)) {
              // Permitir que la tecla se refleje en el valor del input (es una letra)
              return true;
            } else {
              // Bloquear todas las demás teclas (no es una letra)
              event.preventDefault();
              return false;
            }
          });
          // Evento 'keydown' para el input con id "ci"
          $('#ci').on('keydown', function(event) {
            // Obtener el código de la tecla presionada
            var keyCode = event.keyCode || event.which;

            // Permitir las teclas "Borrar" (Eliminar o Backspace)
            if (keyCode === 8) {
              return true;
            }

            // Verificar si el código de la tecla corresponde a un número (0-9)
            if ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105)) {
              // Permitir que la tecla se refleje en el valor del input (es un número)
              return true;
            } else {
              // Bloquear todas las demás teclas (no es un número ni la tecla "Borrar")
              event.preventDefault();
              return false;
            }
          });
    });
</script>

@endsection

