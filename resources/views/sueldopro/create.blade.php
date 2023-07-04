@extends('layouts.panel')

@section('content')

<div class="container">
<h1 class="text-center"> REGISTRO DE SUELDO</h1>
<?php $fcha = date("Y-m-d"); ?>
    <form method="post" action="{{ url('/sueldopro')}}" enctype="multipart/form-data">
     @csrf   
        <div class="row p-3 mb-2 bg-dark text-white">
            <div class="col-12"> 
                <div class="m-portlet__body m-portlet--primary" data-portlet="true" m-portlet="true">
                    <div class="form-group m-form__group row">
                             <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">profesor </label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <select type="text" name="profesor_id" id="profesor_id" class="form-control">
                                            @foreach ($profesors as $profesor)
                                            <option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
                                            @endforeach
                                        </select><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                         <label class="text-primary text-capitalize">fecha de sueldo</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="date" name="fechadesueldo" id="fechadesueldo" class="form-control" value="<?php echo $fcha; ?>" > <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize" >mes de pago</label>
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
                                        <label class="text-primary text-capitalize">sueldo</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="sueldo" id="sueldo" class="form-control"> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">totaldescuento</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input type="text" name="totaldescuento" id="totaldescuento" class="form-control"> <br>
                                       
                                    </div>
                                    <div class="col-8 col-md-3">
                                         <a href="{{ url('detallesupro/') }}" class="btn btn-success text-capitalize">verificar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">totalpago</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="totalpago" id="totalpago" class="form-control"> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">observacion</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="observacion" id="observacion" class="form-control"> <br>
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
                                    <div class="col-12 col-md-12 text-align: center;">
                                    <center> <a href="{{ url('sueldopro/') }}" class="btn btn-info text-capitalize">regresar</a></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-12 col-md-12 " >
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
@endsection
