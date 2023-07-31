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
                                  <div class="col-8 col-md-9">
                                    <input class="form-control" placeholder="monto " type="number" name="monto" required autocomplete="monto" id="monto" disabled>
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
@endsection
    