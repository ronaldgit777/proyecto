@extends('layouts.panel')

@section('content')

<div class="container" >
    <div class="card shadow shadow p-3 mb-2 bg-info text-white">
            <div class="card-header border-0">
                <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">PAGO DE SUELDO DEL PROFESOR</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('sueldopro/')}}" class="btn btn-sm btn-success">
                        <i class="fas fa-undo"></i>
                        regresar</a>
                </div>
                </div>
            </div>
        <?php $fcha = date("Y-m-d"); ?>
    <form method="post" action="{{ url('/sueldopro')}}" enctype="multipart/form-data">
     @csrf   
        <div class="row p-3 mb-2 text-white">
            <div class="col-12"> 
                <div class="m-portlet__body m-portlet--primary" data-portlet="true" m-portlet="true">
                    <div class="form-group m-form__group row">

                             <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                        <div class="col-4 col-md-3">
                                            <label class=" text-capitalize">profesor </label>
                                        </div>
                                    <div class="col-8 col-md-9">
                                        <select type="text" name="profesor_id" id="profesor_id" class="form-control" required>
                                            <option selected disabled value="">seleccione al profesor</option>
                                            
                                            @foreach ($profesors as $profesor)
                                            <option value="{{ $profesor->id }}">{{ $profesor->nombre."-SUELDO : ".$profesor->sueldo }}</option>
                                            @endforeach
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                         <label class="text text-capitalize">fecha de pago</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="date" name="fechadesueldo" id="fechadesueldo" class="form-control" value="<?php echo $fcha; ?>" > <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text text-capitalize" >mes de pago</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                         <select type="text" name="mesdepago" id="mesdepago" class="form-control">
                                            <option value="enero">enero</option>
                                            <option value="febrero">febrero</option>
                                            <option value="marzo">marzo</option>
                                            <option value="abril">abril</option>
                                            <option value="mayo">mayo</option>
                                            <option value="junio">junio</option>
                                            <option value="julio">julio</option>
                                            <option value="agosto">agosto</option>
                                            <option value="septiembre">septiembre</option>
                                            <option value="octubre">octubre</option>
                                            <option value="noviembre">noviembre</option>
                                            <option value="diciembre">diciembre</option>
                                        </select><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text text-capitalize">sueldo</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                  
                                        <input type="text"  id="sueldo" class="form-control"  value=""  > 
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text text-capitalize">totaldescuento</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input type="text" name="totaldescuento" id="totaldescuento" class="form-control" > <br>
                                       
                                    </div>
                                    <div class="col-8 col-md-3">

                             <a href="" class="btn btn-primary disabled" data-toggle="modal" data-target="#myModal2" onclick="veradelantos()" id="bo" > <i class="fas fa-plus-circle"></i>ver descuentos</a>
                             
                                        <script>
                                                   function veradelantos() {
                                                      
                                                        var profesorId = $('#profesor_id').val();
                                                        
                                                        $.ajax({
                                                                url: '{{ url("obtener-adelantopro") }}',
                                                                type: 'POST',
                                                                data: {
                                                                    profesor_id: profesorId,
                                                                    _token: '{{ csrf_token() }}'
                                                                },
                                                                success: function(response) {
                                                                    $('#miadelanto').empty();
                                                                   
                                                                    $.each(response, function(key, value) {
                                                                       // alert(value.id)
                                                                        $('#miadelanto').append(
                                                                            '<tr>'+
                                                                            ' <td>'+value.id+'</td>'+
                                                                                '<td>'+value.fechaadelantopro+'</td>'+
                                                                                ' <td>'+value.monto+'</td>'+
                                                                                ' <td>'+value.observacion+'</td>'+
                                                                                '<td>'+value.nombre_profesor+'</td>'+
                                                                            ' </tr>'
                                                                        );
                                                                    });
                                                                }
                                                                ,     error: function(xhr, status, error) {
                                                                            // Manejar el error aquí
                                                                            console.error(error);
                                                                        }
                                                                        });
                                                   }
                                                        
                                        </script>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text text-capitalize">totalpago</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="totalpago" id="totalpago" class="form-control" > <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text text-capitalize">observacion</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="observacion" id="observacion" class="form-control" required> <br>
                                    </div>
                                </div>
                            </div>
                         
                            
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-12 col-md-12 " >
                                    <center><input type="submit" value="guardar datos" class="btn btn-primary disabled" id="botonguardar" ></center>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection


  <!--empeiza el modal-->
  <div class="modal fade " id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content p-3 mb-2 bg-info">
                 <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      <div class="card shadow p-3 mb-2 bg-info text-white">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0">REGISTRO DEL ADELANTO </h3>
                                    </div>
                                    <div class="col text-right">
                                    </div>
                                </div>
                            </div>
                                    <div  class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light table-primary">
                                                <tr>
                                                    <th>#</th>
                                                    <th>fechadesupre</th>
                                                    <th>monto</th>
                                                    <th>observacion</th>
                                                    <th>profesor_id</th>
                                                </tr>
                                            </thead>
                                            <tbody id="miadelanto">
                                                @foreach ($adelantopros as $adelantopro)
                                                <tr>
                                                    <td>{{ $adelantopro->id }}</td>
                                                    <td>{{ $adelantopro->fechaadelantopro }}</td>
                                                    <td>{{ $adelantopro->monto }}</td>
                                                    <td>{{ $adelantopro->observacion }}</td>
                                                    <td>{{ $adelantopro->profesor_id ."-".$adelantopro->profesor->nombre}}</td>
                                                    </td>
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
             </form>
                </div>
            </div>
      </div>
  </div>
<!--filaliza el modal-->









<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script>
    $(document).ready(function() {
        //verificar q esten el sueldo y descuento 
        var bansueldo = false;
        var bandescuento =false;
        $('#profesor_id').on('change', function() {
        var profesorId = $(this).val();
         bansueldo = false;
         bandescuento =false;
        //$('#bo').class=disabled
        $('#bo').removeClass('disabled');
      //  $('#bo').addClass('clase-nueva');
        
        // Realizar la consulta AJAX para obtener sueldoprofesor
        obtenersueldoprofesor(profesorId);
        
        // Realizar la consulta AJAX para obtener los meses de deuda
        //obtenerlosmesesdeuda(profesorId);
        
        // Realizar la consulta AJAX para obtener la sumatoria de adelantos
        obtenerSumatoriaAdelantos(profesorId);
        //resultado de el suedo menos los adaelnto
        /*setTimeout(function() {
                console.log('Ejecutando función cada 2 segundos.');
                var totalpago = $('#sueldo').val()-$('#totaldescuento').val();
                    $('#totalpago').val(totalpago); 
                    //alert($('#sueldo').val());
                // Agrega aquí el código que deseas ejecutar cada 2 segundos
            }, 1000); // 2000 milisegundos = 2 segundos */
        //generar meses
        obtenerMeses(profesorId);
        });


        function obtenersueldoprofesor(profesorId) {
            
            // Realizar la solicitud AJAX para obtener sueldoprofesor
            $.ajax({
                url: '{{ url("obtener-sueldoprofesor") }}',
                type: 'POST',
                data: {
                    profesor_id: profesorId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    //alert(response);
                    $('#sueldo').val(response);
                    if(bandescuento) {
                        var totalpago = $('#sueldo').val()-$('#totaldescuento').val();
                         $('#totalpago').val(totalpago);
                    } else{
                        bansueldo = true;
                    }
                }
            });
        }

        
        function obtenerSumatoriaAdelantos(profesorId) {
            // Realizar la solicitud AJAX para obtener sueldoprofesor
            $.ajax({
                url: '{{ url("obtener-SumatoriaAdelantos") }}',
                type: 'POST',
                data: {
                    profesor_id: profesorId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    //alert(response);
                    $('#totaldescuento').val(response);
                    if(bansueldo) {
                        var totalpago = $('#sueldo').val()-$('#totaldescuento').val();
                         $('#totalpago').val(totalpago);
                    } else{
                        bandescuento = true;
                    }
                }
            });
        }

        function obtenerMeses(profesorId) {
            $('#botonguardar').addClass('disabled');
            // Realizar la solicitud AJAX para obtener sueldoprofesor
            $.ajax({
                url: '{{ url("obtener-mesessaldopro") }}',
                type: 'POST',
                data: {
                    profesor_id: profesorId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(meses) {
                   var cont=0;
                   // alert("todo ok");
                     // Limpiar el campo de selección de periodos
                     $('#mesdepago').empty();
                   //  for (var i = 0; i < meses.length; i++) {
                    for (var i = 0; i < 1; i++) {
                            var mes = meses[i];
                            //alert(mes);
                            $('#mesdepago').append(
                                //obteniendo todos los meses
                                '<option value="' + mes + '">' + mes + '</option>'
                            );
                            cont++;
                        }
                    if(cont >0){
                        $('#botonguardar').removeClass('disabled');
                    }
                  
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                      // Limpiar el campo de selección de periodos
                       
                }
            });
        }
            // Simular el evento change al cargar la página
        $('#aula_id').trigger('change');
    });
</script>
