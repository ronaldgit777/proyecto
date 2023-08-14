@extends('layouts.panel')

@section('content')
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">LISTA DE ALUMNOS del profesor <label>  {{ $usuario[0]->nombre.'-'.$usuario[0]->apellidopaterno.'-'.$usuario[0]->apellidomaterno }} </label>
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
                        <label class="text-primary text-capitalize">materia</label>
                        <select type="text" name="materia_id2" id="materia_id2" class="form-control" >
                          <option selected value="">seleccione la materia</option>
                          @foreach ($materias as $materia)
                          <option value="{{ $materia->id }}">{{ $materia->materia}}</option>
                          @endforeach
                        </select>
                      {{-- <input type="text" name="materia_id" id="materia_id" class="form-control" > --}}
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
                        <a href="{{url('home')}}" class="btn btn-sm btn-success" >
                        <i class="fas fa-plus-circle"></i>
                        regresar</a>
                    </div>  
              </div>s
          </div>
  </div>
</div> 

        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">materia</th>
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
                <th scope="col">acciones</th>
              </tr>
            </thead>
            <tbody id="tabla_alu">
              @foreach ($alumnos as $alumno)
                        <tr>
                            <td scope="row">{{ $alumno->nombre_materia }}</td>
                            <td>{{ $alumno->fechadeingreso }}</td>
                            <td>{{ $alumno->ci }}</td>
                            <td>{{ $alumno->nombre }}</td>
                            <td>{{ $alumno->apellidopaterno }}</td>
                            <td>{{ $alumno->apellidomaterno }}</td>
                            <td>{{ $alumno->celular }}</td>
                            <td>{{ $alumno->direccion }}</td>
                            <td>{{ $alumno->correo }}</td>
                            <td>{{ $alumno->estado }}</td>
                            <td>
                            <img src="{{ asset('storage').'/'.$alumno->imagen}}" alt=""  width="50px" height="50px"  class="img-thumbnail img-fluid">
                            </td>
                            <td>
                               
                            <button onclick="cargarid('{{ $alumno->id }}','{{ $alumno->materiaid }}')" data-toggle="modal" data-target="#myModal2"  id="bo" class="btn btn-sm btn-primary"> 
                            <i class="far fa-file-alt"></i></button>

                            <button onclick="cargaridnotas('{{ $alumno->id }}','{{ $alumno->materiaid }}','{{ $alumno->nombre }}','{{ $alumno->apellidopaterno }}','{{ $alumno->apellidomaterno }}','{{ $alumno->nombre_materia }}')" 
                                data-toggle="modal" data-target="#myModal3"  id="bonota" class="btn btn-sm btn-primary"> 
                                <i class="far fa-file-alt">promedio</i></button>

                            <a href="{{ url('/alumno/'.$alumno->id.'/') }}" method="post" class="btn btn-sm btn-danger">
                              <i class="far fa-eye"></i></a>     
                              <a href="{{ url('/alumno/'.$alumno->id.'/edit') }}" method="post" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i></a>         
                            </td>
                        </tr>
                        @endforeach
            </tbody>
          </table>
        </div>
   </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
   <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/pdfmake.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/vfs_fonts.js"></script>
   <script>
     function cargarid(alumnoid,materiaid) {

            var selectElement = document.getElementById('alumno_id'); // Obtener el elemento select
            var selectElementmateriaid = document.getElementById('materia_id'); 
            $('#materia2').val(materiaid); $('#alumno2').val(alumnoid); 
            var options = selectElement.options; // Obtener todas las opciones del select
            var optionsmateriaid = selectElementmateriaid.options; 
            
            for (var i = 0; i < options.length; i++) {
                if (options[i].value === alumnoid) {
                options[i].selected = true; // Seleccionar la opción si coincide con el valor
                }
            }
            for (var i = 0; i < optionsmateriaid.length; i++) {
                if (optionsmateriaid[i].value === materiaid) {
                    optionsmateriaid[i].selected = true; // Seleccionar la opción si coincide con el valor
                }
            }
            
         }
         
         function redondearAUnDecimal(numero) {
            return Math.round(numero * 10) / 10;
            }
         function cargaridnotas(alumnoid,materiaid,nombre,apellidopaterno,apellidomaterno,nombre_materia) {
            $('#alumno1').val(nombre+' '+apellidopaterno+' '+apellidomaterno);
            $('#materia1').val(nombre_materia);
         
    $.ajax({
                url: '{{ url("obtener-notasdelalumnoid") }}', // Ruta a tu controlador Laravel
                type: 'POST',
                data: {
                    alumnoid: alumnoid,
                    materiaid: materiaid,
                    
                    // profesor_id: profesorId,
                    _token: '{{ csrf_token() }}' // Agregar el token CSRF
                },
                success: function(response) {
                    
                  
                    // Limpiar el campo de selección de periodos
                    $('#tabla_nota').empty();
                    // profesorreporte=[];
                    var sumanota =0;var connota=0;
                    $.each(response, function(key, value) {
                        // alert(value.id)
                        $('#tabla_nota').append(
                            '<tr>'+
                            // ' <td>'+value.id+'</td>'+
                                '<td>'+value.fechadenota+'</td>'+
                                '<td>'+value.nombre_actividad+'</td>'+
                                ' <td>'+value.nota+'</td>'+
                            ' </tr>'
                        );
                        //alert(value.id);
                        // profesorreporte.push(encontrarListaPorId(value.id)); //añadiendo elemtos a la nueva variable
                        // $('#miadelanto').find('td').css('border', '1px solid black');
                        sumanota=sumanota+value.nota; connota++;
                    });
                    $('#sumanota').val(sumanota);
                    $('#cannota').val(connota);
                    $('#promedio').val(redondearAUnDecimal(sumanota/connota));
                    // if(buscarpendiente==true){
                    //     buscarpendiente=false;
                    //     $('#fechainicio').trigger('change');
                    // }
                },

                // error: function (xhr, status, error) {
                // console.error('Error en la solicitud:', error);
                // }
            });
        
        
     }
         
       //  var busquependiente=false; var buscarpendiente=false;
         $(document).ready(function() {
            $('#fechainicio').on('change', function() {
           //     console.log(buscarpendiente);
           // if(busquependiente==false){
                //busquependiente=true;
                var fecha_ini = $(this).val(); 
                //var user_id = $('#user_id').val();
                var fecha_fin = $('#fechafinal').val();
                var buscar = $('#buscar').val();  
                var materiaid = $('#materia_id2').val();  //alert(materiaid)  
                generartabla(fecha_ini,fecha_fin,buscar,materiaid);  
            //}else{
                //buscarpendiente=true;
            
                //$('#fechainicio').trigger('change');
           // }
        
            
            });
            function generartabla(fecha_ini,fecha_fin,buscar,materiaid) {
                $.ajax({
                    url: '{{ url("obtener-fechainicioalumnosprofe") }}', // Ruta a tu controlador Laravel
                    type: 'POST',
                    data: {
                        fechainicio: fecha_ini, //lo de blanco es la llave q tienes para q se capture la variable
                        fechafinal: fecha_fin,
                        //user_id:user_id,
                        buscaralu: buscar,// Enviar el ID del aula seleccionada
                        materiaid: materiaid,
                        // profesor_id: profesorId,
                        _token: '{{ csrf_token() }}' // Agregar el token CSRF
                    },
                    success: function(response) {
                     
                      
                        // Limpiar el campo de selección de periodos
                        $('#tabla_alu').empty();
                        // profesorreporte=[];
                        $.each(response, function(key, value) {
                            // alert(value.id)
                            $('#tabla_alu').append(
                                '<tr>'+
                                // ' <td>'+value.id+'</td>'+
                                    '<td>'+value.nombre_materia+'</td>'+
                                    '<td>'+value.fechadeingreso+'</td>'+
                                    ' <td>'+value.ci+'</td>'+
                                    ' <td>'+value.nombre+'</td>'+
                                    ' <td>'+value.apellidopaterno+'</td>'+
                                    ' <td>'+value.apellidomaterno+'</td>'+
                                    ' <td>'+value.celular+'</td>'+
                                    ' <td>'+value.direccion+'</td>'+
                                    ' <td>'+value.correo+'</td>'+
                                    ' <td>'+value.estado+'</td>'+
                                    ' <td><img src="'+value.ruta_imagen+'" alt=""  width="50px"  height="50px" class="img-thumbnail img-fluid"></td>'+
                                    // ' <td>'+value.role+'</td>'+
                                    ' <td>'+
    '<button onclick="cargarid('+{{ $alumno->id }}+','+{{ $alumno->materiaid }}+')" data-toggle="modal" data-target="#myModal2" id="bo" class="btn btn-sm btn-primary"> <i class="far fa-file-alt"></i></button>' +
                                        '<a href="/proyecto/public/alumno/' + value.id + '/edit" method="post" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i></a>' +
                                        '<a href="/proyecto/public/alumno/' + value.id + '/" method="post" class="btn btn-sm btn-danger"> <i class="far fa-eye"></i></a>'+
                                    ' </td>'+
                                ' </tr>'
                            );
                            //alert(value.id);
                            // profesorreporte.push(encontrarListaPorId(value.id)); //añadiendo elemtos a la nueva variable
                            // $('#miadelanto').find('td').css('border', '1px solid black');
                        });
                        // if(buscarpendiente==true){
                        //     buscarpendiente=false;
                        //     $('#fechainicio').trigger('change');
                        // }
                    },

                    // error: function (xhr, status, error) {
                    // console.error('Error en la solicitud:', error);
                    // }
                });
            }
            $('#fechafinal').on('change', function() {
            $('#fechainicio').trigger('change');
            });
            $('#buscar').on('input', function() {
            $('#fechainicio').trigger('change');
            });
            $('#materia_id2').on('change', function() {
            $('#fechainicio').trigger('change');
            });
    });
  </script>
  <!--empeiza el modal-->
  <div class="modal fade " id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg " role="document">
          <div class="modal-content p-3 mb-2 bg-info">
               <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    <div class="card shadow p-3 mb-2 bg-info text-blue">
                              <div class="card-header border-0">
                                  <div class="row align-items-center">
                                      <div class="col">
                                          <h3 class="mb-0">REGISTRAR NOTA</h3>
                                      </div>
                                        <?php $fcha = date("Y-m-d"); ?>
                                        <form method="post" action="{{ url('/notamodal')}}" enctype="multipart/form-data">
                                        @csrf   
                                        <input type="text"  id="materia2"  name="materia_id" class="d-none"  value=""  readonly> 
                                        <input type="text"  id="alumno2"  name="alumno_id" class="d-none"  value=""  readonly> 
                                        {{-- <input type="text"  id="asignarproma_id"  name="asignarproma_id" class="d-none"  value=""  readonly>  --}}
                                            <div class="row p-3 mb-2  text-blue">
                                                <div class="col-12"> 
                                                    <div class="m-portlet__body m-portlet--primary" data-portlet="true" m-portlet="true">
                                                        <div class="form-group m-form__group row">
                                                                <div class="col-12 col-sm-12 col-md-6">
                                                                    <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                                                        <div class="col-4 col-md-3">
                                                                            <label class="text text-capitalize">fecha de nota</label>
                                                                        </div>
                                                                        <div class="col-8 col-md-9">
                                                                            <input class="form-control" placeholder="fechadenota" type="date" name="fechadenota"   id="fechadenota" value="<?php echo $fcha; ?>" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-6">
                                                                    <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                                                        <div class="col-4 col-md-3">
                                                                            <label class="text text-capitalize">actividad </label>
                                                                        </div>
                                                                        <div class="col-8 col-md-9">
                                                                          
                                                                            <select type="text"  id="actividad_id"  name="actividad_id" class="form-control" required>
                                                                                <option selected disabled value="">seleccione la actividad</option>
                                                                                @foreach ($actividads as $actividad)
                                                                                <option value="{{ $actividad->id }}">{{$actividad->actividad}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-6">
                                                                    <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                                                        <div class="col-4 col-md-3">
                                                                            <label class="text text-capitalize">materia </label>
                                                                        </div>
                                                                        <div class="col-8 col-md-9">
                                                                            <select type="text"  id="materia_id" name="materia_id"  class="form-control" required disabled>
                                                                                <option selected disabled value="">seleccione la materia</option>
                                                                                @foreach ($materias as $materia)
                                                                                <option value="{{ $materia->id }}">{{ $materia->materia}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-6">
                                                                    <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                                                        <div class="col-4 col-md-3">
                                                                            <label class="text text-capitalize">nota </label>
                                                                        </div>
                                                                        <div class="col-8 col-md-9">    
                                                                            <input class="form-control" placeholder="ingrese la nota" type="text" name="nota"  id="nota"  required >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-6">
                                                                    <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                                                        <div class="col-4 col-md-3">
                                                                            <label class="text text-capitalize">alumno</label>
                                                                        </div>
                                                                        <div class="col-8 col-md-9">
                                                                            <select type="text" name="alumno_id" id="alumno_id" class="form-control" required disabled>
                                                                                <option selected disabled value="">seleccione el alumno</option>
                                                                                @foreach ($alumnos as $alumno)
                                                                                <option value="{{ $alumno->id }}">{{ $alumno->nombre."-".$alumno->apellidopaterno."-".$alumno->apellidomaterno }}</option>
                                                                                @endforeach
                                                                            </select> 
                                                                        </div>
                                                                    </div>
                                                                </div>                  
                                                                <div class="col-12 col-sm-12 col-md-6">
                                                                    <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                                                        <div class="col-4 col-md-3">
                                                                            <label class="text text-capitalize">estado </label>
                                                                        </div>
                                                                        <div class="col-8 col-md-9">
                                                                            {{-- <select type="text" name="estado" id="estado" class="form-control" required>
                                                                                <option value="activo">activo</option> 
                                                                                <option value="inactivo">inactivo</option> 
                                                                                </select><br> --}}
                                                                                <input type="text" name="estado" id="estado" class="form-control" required value="activo" readonly> <br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-6">
                                                                    <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                                                        <div class="col-4 col-md-3">
                                                                            <label class="text text-capitalize"></label>
                                                                        </div>
                                                                        <div class="col-8 col-md-9">
                                                                            <center><input type="submit" value="guardar datos" class="btn btn-primary"></center>
                                                                              
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </form>
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
                                          <h3 class="mb-0">LISTA DE NOTAS</h3>
                                          <div class="row">
                                                <div class="col">
                                                <input type="text" name="sumanota" id="sumanota" class="form-control" placeholder="suma notas" disabled>
                                                <snap class="text-sm">SUMA DE NOTAS</snap>
                                                </div>
                                                <div class="col">
                                                <input type="text" name="cannota" id="cannota" class="form-control" placeholder="can-notas" disabled>
                                                <snap class="text-sm">CANTIDAD DE NOTAS</snap>
                                                </div>
                                                <div class="col">
                                                    <input type="text" name="promedio" id="promedio" class="form-control" placeholder="promedio" disabled>
                                                    <snap class="text-sm">promedio</snap>
                                                </div>   
                                                <div class="col">
                                                    <button class="btn btn-danger" type="button"><i class="fas fa-print"></i>imprimir</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" name="alumno1" id="alumno1" class="form-control" placeholder="suma notas"  disabled>
                                                    <snap class="text-sm">alumno</snap>
                                                    </div>
                                                    <div class="col">
                                                    <input type="text" name="profesor1" id="profesor1" class="form-control" 
                                                    value=" {{ $usuario[0]->nombre.'-'.$usuario[0]->apellidopaterno.'-'.$usuario[0]->apellidomaterno }}" disabled>
                                                    <snap class="text-sm">profesor</snap>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" name="materia1" id="materia1" class="form-control" placeholder="promedio" disabled>
                                                        <snap class="text-sm">materia</snap>
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
                                            <th>fechadenota</th>
                                            <th>actividad_id</th>
                                            <th>nota</th>
                                            {{-- <th>estado</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody id="tabla_nota">
                                        @foreach ($notas as $nota)
                                        <tr>
                                            <td>{{ $nota->fechadenota}}</td>
                                            <td>{{ $nota->actividad_nombre}}</td>
                                            <td>{{ $nota->nota}}</td>
                                            {{-- <td>{{ $nota->estado}}</td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
