@extends('layouts.panel')

@section('content')

<div class="container" >
    <div class="card shadow p-3 mb-2 bg-info text-white">
            <div class="card-header border-0">
                <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">REGISTRAR NUEVO ADELANTO DE SECRETARIA</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('adelantosecre/')}}" class="btn btn-sm btn-success">
                        <i class="fas fa-undo"></i>
                        regresar</a>
                </div>
                </div>
            </div>
            <?php $fcha = date("Y-m-d"); ?>
          <form method="post" action="{{ url('/adelantosecre')}}" enctype="multipart/form-data">
          @csrf   
              <div class="row p-3 mb-2  text-white">
                  <div class="col-12"> 
                      <div class="m-portlet__body m-portlet--primary" data-portlet="true" m-portlet="true">
                          <div class="form-group m-form__group row">
                              <div class="col-12 col-sm-12 col-md-6">
                                  <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                      <div class="col-4 col-md-3">
                                          <label class="text-black text-capitalize">fecha de adelanto</label>
                                      </div>
                                        <div class="col-8 col-md-9">
                                          <input class="form-control" placeholder="fechaadelantosecre" type="date" name="fechaadelantosecre"  value="<?php echo $fcha; ?>"  >
                                        </div>
                                  </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-6">
                                  <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                      <div class="col-4 col-md-3">
                                          <label class="text text-capitalize" >secretaria</label>
                                      </div>
                                      <div class="col-8 col-md-9">
                                          <select type="text" name="secretaria_id" id="secretaria_id" class="form-control" required>
                                              <option selected disabled value="">seleccione a la secretaria</option>
                                              @foreach ($secretarias as $secretaria)
                                              <option value="{{ $secretaria->id }}">{{ $secretaria->nombre."-".$secretaria->sueldo }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-6">
                                  <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                      <label class="text text-capitalize" >monto</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                      <input class="form-control" placeholder="monto " type="number" name="monto" required autocomplete="monto" id="monto" disabled>
                                    </div>
                                      <div class="col-8 col-md-3">
                                        <a href="" class="btn btn-success disabled" data-toggle="modal" data-target="#myModal2" onclick="veradelantos()" id="bo" > 
                                       <i class="far fa-eye"></i></a>
                                                    <script>
                                                              function obteneradelantodisponible() {
                                                                var secretariaId = $('#secretaria_id').val(); //alert(profesorid);
                                                                $.ajax({
                                                                            url: '{{ url("obtener-adelantodisposecre") }}',
                                                                            type: 'POST',
                                                                            data: {
                                                                              secretaria_id: secretariaId,
                                                                                _token: '{{ csrf_token() }}'
                                                                            },
                                                                            success: function(responseresul) {
                                                                                 //alert(responseresul);
                                                                                 $('#adedisponible').val(responseresul);
                                                                            }
                                                                            ,error: function(xhr, status, error) {
                                                                                        // Manejar el error aquí
                                                                            console.error(error);
                                                                                    }
                                                                         });
                                                              }
                                                               function veradelantos() {
                                                                    var secretariaId = $('#secretaria_id').val();
                                                                    $.ajax({
                                                                            url: '{{ url("obtener-adelantosecre") }}',
                                                                            type: 'POST',
                                                                            data: {
                                                                              secretaria_id: secretariaId,
                                                                                _token: '{{ csrf_token() }}'
                                                                            },
                                                                            success: function(response) {
                                                                                $('#miadelanto').empty();
                                                                               var totaladelanto = 0;
                                                                                $.each(response, function(key, value) {
                                                                                  totaladelanto=totaladelanto+value.monto
                                                                                    $('#miadelanto').append(
                                                                                        '<tr>'+
                                                                                        // ' <td>'+value.id+'</td>'+
                                                                                            '<td>'+value.fechaadelantosecre+'</td>'+
                                                                                            ' <td>'+value.monto+'</td>'+
                                                                                            ' <td>'+value.estadoade+'</td>'+
                                                                                            ' <td>'+value.observacion+'</td>'+
                                                                                            '<td>'+value.secretaria_id+"-"+value.nombre_secretaria+'</td>'+
                                                                                        ' </tr>'
                                                                                    );
                                                                                    $('#miadelanto').find('td').css('border', '1px solid black');
            
                                                                                });
                                                                                $('#totalade').val(totaladelanto);
                                                                                obteneradelantodisponible();  
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
                                          <label class="text text-capitalize">estado</label>
                                      </div>
                                      <div class="col-8 col-md-9">
                                          <input class="form-control"  type="estadoade" name="estadoade" required autocomplete="estadoade" id="estado" value="pendiente" readonly> 
                                      </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-6">
                                  <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                      <div class="col-4 col-md-3">
                                          <label class="text text-capitalize">observacion</label>
                                      </div>
                                        <div class="col-8 col-md-9">
                                          <input class="form-control" placeholder="observacion" type="observacion" name="observacion" required autocomplete="observacion">
                                        </div>
                                  </div>
                                </div>
                              
                                  <div class="col-12 col-sm-12 col-md-6">
                                      <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                          <div class="col-12 col-md-12 " >
                                              <center><input type="submit" value="guardar datos" class="btn btn-primary" onclick="generarpdfadelanto()" disabled id="botonadelanto"></center>
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
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/pdfmake.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/vfs_fonts.js"></script>
<script>
  $(document).ready(function() {
      $('#monto').on('input', function() {
        var secretariaid = $('#secretaria_id').val();  
       if(secretariaid != ''){
         var monto = $('#monto').val(); 
                  $.ajax({
                    url: '{{ url("validar-montoadelantosecre") }}',
                    type: 'POST',
                    data: {
                        secretariaid: secretariaid, //lo de blanco es la llave q tienes para q se capture la variable
                        monto:monto,
                        _token: '{{ csrf_token() }}'
                      },
                    success: function (resultado) {
                      if(resultado){
                        $("#botonadelanto").prop("disabled", false); 
                      }else{
                        $("#botonadelanto").prop("disabled", true); 
                      }
                    }
                  });
           }
      });
      $('#secretaria_id').on('change', function() {
            var secretariaid = $('#secretaria_id').val();  
          if(secretariaid != ''){
            $("#monto").prop("disabled", false); 
            $('#bo').removeClass('disabled');
            //$("#botonadelanto").prop("disabled", false); 
          }
      });
});
</script>

<script>
    function generarpdfadelanto(){
     
        var fechaadelantosecre =    $('#fechaadelantosecre').val();
        var monto = $('#monto').val();
        var estadoade = $('#estadoade').val();
        var observacion = $('#observacion').val();
        var secretaria_id = $('#secretaria_id option:selected').text();
        const docDefinition = {
        content: [
          { text: "Reporte de adelanto", style: "header" },
          {
            table: {
              headers: ["fecha de adelanto:", "monto", "estado", "observacion", "secretaria_id"],
              body: [
                ["fecha de adelanto:", "monto", "estado", "observacion", "secretaria_id"],
                [fechaadelantosecre,monto,estadoade,observacion,profesor_id]
              ],
            },
          },
          /*
          { text: 'fecha de adelanto:'+ fechaadelantopro},
          { text: 'monto:'+ monto},
          { text: 'observacion:'+ observacion},
          { text: 'profesor_id:'+ profesor_id},*/
        ],
        styles: {
          header: { fontSize: 18, bold: true, margin: [0, 0, 0, 10] },
          subheader: { fontSize: 14, bold: true, margin: [0, 0, 0, 5] },
        },
      };
           // Generar el documento PDF
           pdfMake.createPdf(docDefinition).download("reporteadelanto.pdf");
    }
</script>
    <!--empeiza el modal-->
    <div class="modal fade " id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content p-3 mb-2 bg-info">
                 <div class="modal-body ">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      <div class="card shadow p-3 mb-2 bg-info">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                      <div class="col">
                                        <h3 class="mb-0">LISTA DE ADELANTOS</h3>
                                        <div class="row">
                                          <div class="col">
                                            <input type="text" name="totalade" id="totalade" class="form-control" placeholder="total adelanto" disabled>
                                            <snap class="text-sm">total adelanto</snap>
                                          </div>
                                          <div class="col">
                                            <input type="text" name="adedisponible" id="adedisponible" class="form-control" placeholder="adelanto disponible" >
                                            <snap class="text-sm">adelanto disponible</snap>
                                          </div>
                                        </div>
                                      </div>
                                    <div class="col text-right">
                                    </div>
                                </div>
                            </div>
                                    <div  class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    {{-- <th>#</th> --}}
                                                    <th>fechadesupre</th>
                                                    <th>monto</th>
                                                    <th>estado</th>
                                                    <th>observacion</th>
                                                    <th>profesor</th>
                                                </tr>
                                            </thead>
                                            <tbody id="miadelanto" class="table align-items-center table-flush">
                                                @foreach ($adelantosecres as $adelantosecre)
                                                <tr>
                                                    {{-- <td>{{ $adelantopro->id }}</td> --}}
                                                    <td>{{ $adelantosecre->fechaadelantosecre }}</td>
                                                    <td>{{ $adelantosecre->monto }}</td>
                                                    <td>{{ $adelantosecre->estadoade }}</td>
                                                    <td>{{ $adelantosecre->observacion }}</td>
                                                    <td>{{ $adelantosecre->secretaria_id ."-".$adelantosecre->secretaria->nombre}}</td>
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
    