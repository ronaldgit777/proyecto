@extends('layouts.panel')

@section('content')

<div class="container" >
    <div class="card shadow p-3 mb-2 bg-info text-white">
            <div class="card-header border-0">
                <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">REGISTRAR NUEVO ADELANTO</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('adelantopro/')}}" class="btn btn-sm btn-success">
                        <i class="fas fa-undo"></i>
                        regresar</a>
                </div>
                </div>
            </div>
            <?php $fcha = date("Y-m-d"); ?>
    <form method="post" action="{{ url('/adelantopro')}}" enctype="multipart/form-data" id="pdfadelanto">
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
                                    <input class="form-control" placeholder="fechaadelantopro" type="date" name="fechaadelantopro"  value="<?php echo $fcha; ?>" id="fechaadelantopro" >
                                  </div>
                            </div>
                          </div>

                          <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                <div class="col-4 col-md-3">
                                    <label class="text text-capitalize" >monto</label>
                                </div>
                                <div class="col-8 col-md-9">
                                    <input class="form-control" placeholder="monto " type="text" name="monto" required autocomplete="monto" id="monto">
                               
                                </div>
                              </div>
                          </div>

                          <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                <div class="col-4 col-md-3">
                                    <label class="text text-capitalize">observacion</label>
                                </div>
                                  <div class="col-8 col-md-9">
                                    <input class="form-control" placeholder="observacion" type="observacion" name="observacion" required autocomplete="observacion" id="observacion"> 
                                  </div>
                            </div>
                          </div>

                          <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                <div class="col-4 col-md-3">
                                    <label class="text text-capitalize" >profesor</label>
                                </div>
                                <div class="col-8 col-md-9">

                                <select type="text" name="profesor_id" id="profesor_id" class="form-control" required>
                                    <option selected disabled value="">seleccione al profesor</option>
                                    @foreach ($profesors as $profesor)
                                    <option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
                                    @endforeach
                                </select>
                                </div>
                              </div>
                          </div>

                          <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                <div class="col-4 col-md-3">
                                    
                                </div>
                                  <div class="col-8 col-md-9">
                                  
                                  </div>
                            </div>
                          </div>
                         
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-12 col-md-12 " >
                                    <center><input type="submit" value="guardar datos" class="btn btn-primary" onclick="generarpdfadelanto()"></center>
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
<!-- Link to pdfmake font files -->
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/vfs_fonts.js"></script>
<script>
    function generarpdfadelanto(){
     
        var fechaadelantopro =    $('#fechaadelantopro').val();
        var monto = $('#monto').val();
        var observacion = $('#observacion').val();
        var profesor_id = $('#profesor_id option:selected').text();
        const docDefinition = {
        content: [
          { text: "Reporte de adelanto", style: "header" },
          {
            table: {
              headers: ["fecha de adelanto:", "monto", "observacion", "profesor_id"],
              body: [
                ["fecha de adelanto:", "monto", "observacion", "profesor_id"],
                [fechaadelantopro,monto,observacion,profesor_id]
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
    