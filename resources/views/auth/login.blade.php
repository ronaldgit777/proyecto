@extends('layouts.form')
@section('title','iniciar secion')
@section('content')

<!-- Page content -->
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">

          <div class="card-body px-lg-5 py-lg-5">

            @if($errors->any())
                <div class="text-center text-muted mb-2">
                    <h4>se encontro el siguent error.</h4>
                </div>
                <div class="alert alert-danger" role="alert">
                    {{$errors->first()}}
                </div>
            @else 
                <div class="text-center text-muted mb-4">
                    <small>Ingrese los siguientes datos para iniciar session</small>
                </div>
            @endif

           
            <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="contraseña" type="password" name="password" required autocomplete="current-password">
                </div>
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                {{-- <input class="custom-control-input" id=" remember" name="remember" type="checkbox"  {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for=" remember">
                  <span class="text-muted">recordar secion</span>
                </label> --}}
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">empezar</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6">
            <a href="{{ route('password.request') }}" class="text-light" ><small>olvidadste tu contraseña?</small></a>
            <button 
            {{-- onclick="cargaridnotas('{{ $alumno->alumnoid }}','{{ $alumno->materiaid }}','{{ $alumno->nombre }}','{{ $alumno->apellidopaterno }}','{{ $alumno->apellidomaterno }}','{{ $alumno->materia }}', 
              '{{ $alumno->profesor_nombre }}','{{ $alumno->profesor_apellidopaterno }}','{{ $alumno->profesor_apellidomaterno }}')"  --}}
              
                data-toggle="modal" data-target="#myModal3"  id="bonota" class="btn btn-sm btn-info"> olvidadste tu contraseña? 
                <i class="fas fa-cogs"></i></button>
          </div>
          <div class="col-6 text-right">
            {{-- <a href="{{ route('register') }}" class="text-light"><small>crear cuenta neuva</small></a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
      //$('#fechainicio').trigger('change');
      var estiloOriginal = $('#buscar').css('border');
  
      // Cuando se produzca el evento 'click' en cualquier input
      $('input').on('click', function() {
        // Restaurar el estilo original del borde en el input "nombre"
        $('#buscar').css('border', estiloOriginal)
      });
  
        $('#fechainicio').on('change', function() {
  
            var fecha_ini = $(this).val(); 
            var fecha_fin = $('#fechafinal').val();
           // var profesorid = $('#profesor_id').val();
            var materiaid = $('#materia_id').val();
            var periodoid = $('#periodo_id').val();
            var aulaid = $('#aula_id').val();  
            var alumno_nombre = $('#alumno_nombre').val();
            var alumno_apepa = $('#alumno_apepa').val();
            var alumno_apema = $('#alumno_apema').val();
            var promin = $('#promin').val();
            var promax = $('#promax').val();
            var ordenar = $('#ordenar').val();
            var mayorymenor = $('#mayorymenor').val();
            var estado = $('#estado').val();

            //alert(fecha_ini+fecha_fin+materiaid+periodoid+aulaid+alumno_nombre+alumno_apepa+alumno_apema+promin+promax+ordenar+mayorymenor)

            generartabla(fecha_ini,fecha_fin,materiaid,periodoid,aulaid,alumno_nombre,alumno_apepa,alumno_apema,promin,promax,ordenar,mayorymenor,estado); 
        });
        function generartabla(fecha_ini,fecha_fin,materiaid,periodoid,aulaid,alumno_nombre,alumno_apepa,alumno_apema,promin,promax,ordenar,mayorymenor,estado) {
              $.ajax({
                    url: '{{ url("obtener-fechainicionotasecre") }}', // Ruta a tu controlador Laravel
                    type: 'POST',
                    data: {
                        fechainicio: fecha_ini, //lo de blanco es la llave q tienes para q se capture la variable
                        fechafinal: fecha_fin,
                       // profesorid: profesorid,// Enviar el ID del aula seleccionada
                        materiaid: materiaid,
                        periodoid: periodoid,
                        aulaid: aulaid,
                        alumno_nombre:alumno_nombre,
                        alumno_apepa:alumno_apepa,
                        alumno_apema:alumno_apema,
                        promin:promin,
                        promax:promax,
                        ordenarasig:ordenar,
                        mayorymenorasig:mayorymenor,
                        estado:estado,
                      // profesor_id: profesorId,
                        _token: '{{ csrf_token() }}' // Agregar el token CSRF
                      
                    },
                    success: function(response) {
                        // Limpiar el campo de selección de periodos
                        $('#tabla_asigre').empty();
                       profesorreporte=[];
                        $.each(response, function(key, value) {
                            // alert(value.id)
                            var imagen='{{asset('storage').'/'}}';
                            var promedio=0;
                            if(value.promedio_notas){
                              promedio=value.promedio_notas;
                            }
                            $('#tabla_asigre').append(
                                '<tr>'+
                                // ' <td>'+value.id+'</td>'+
                                    '<td>'+value.fechadeingreso+'</td>'+
                                    '<td>'+value.ci+'</td>'+
                                    ' <td>'+value.alumno_nombre+'</td>'+
                                    '<td>'+value.alumno_paterno+'</td>'+
                                    '<td>'+value.alumno_materno+'</td>'+
                                    ' <td>'+value.materia_nombre+'</td>'+
                                    ' <td>'+promedio+'</td>'+
                                    ' <td>'+value.periodo_nombre+'</td>'+
                                    ' <td>'+value.aula_nombre+'</td>'+
                                    ' <td>'+value.asignarpromas_estado+'</td>'+
                                    ' <td><img src="'+imagen+value.imagen+'" alt=""  width="50px"  height="50px" class="img-thumbnail img-fluid"></td>'+
                                   // ' <td>'+value.role+'</td>'+
                                    ' <td>'+
                                      // '<a href="/proyecto/public/asignacion/' + value.id + '/edit" method="post" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i>hola</a>' +
 '<button onclick="cargaridnotas('+ value.id +','+ value.materiaid +',\''+ value.nombre +'\',\''+ value.apellidopaterno +'\',\''+ value.apellidomaterno +'\',\''+ value.materia_nombre +'\',\''+ value.profesor_nombre +'\',\''+ value.profesors_paterno +'\',\''+ value.profesor_materno +'\') " data-toggle="modal" data-target="#myModal3"  id="bonota" class="btn btn-sm btn-info"><i class="far fa-file-alt"></i></button>'+                                    
 ' </td>'+
 
                                ' </tr>'
                            );
                            //alert(value.id);
                           profesorreporte.push(encontrarListaPorId(value.id)); //añadiendo elemtos a la nueva variable
                           // $('#miadelanto').find('td').css('border', '1px solid black');
                        });
                    }  
                });
        }
        });
 </script>
@endsection
<!--empeiza el modal-->
<div class="modal fade " id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content p-3 mb-2 bg-info">
           <div class="modal-body ">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                      <span aria-hidden="true">&times;</span>
                  </button>
                <div class="card shadow p-3 mb-2 ">
                {{-- <div class="card shadow p-3 mb-2 bg-info"> ESE BG-INFO PONE COLOR TRANS--}}
                           <div class="card-header border-0">
                                  <div class="row align-items-center">
                                      <div class="col">
                                        <h3 class="mb-0">Formulario de recuperar contraseña</h3>
                                        <br>
                                          <div class="row">
                                              <div class="col">
                                                  <input type="text" name="email" id="email" class="form-control" placeholder="ingrese su email"  autocomplete="off">
                                                  <snap class="text-sm">Email</snap>
                                                  </div>
                                                  <div class="col">
                                                  <input type="text" name="ci" id="ci" class="form-control" placeholder="ingrese su ci" autocomplete="off">
                                                  <snap class="text-sm">Ci</snap>
                                                  </div>
                                                  <div class="col">
                                                    <button class="btn btn-danger" type="button"><i class="far fa-paper-plane" ></i> enviar</button>
                                                </div>
                                          </div>
                                      </div>
                                </div>
                            </div>
                              <div class="col-12 col-sm-12 col-md-6">
                                  <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                      <div class="col-12 col-md-12 " >
                                      </div>
                                  </div>
                              </div>
               </div>
          </div>
      </div>
  </div>
</div>
    <!--filaliza el modal-->