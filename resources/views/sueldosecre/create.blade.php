@extends('layouts.panel')

@section('content')

<div class="container" >
    <div class="card shadow shadow p-3 mb-2 bg-info text-white">
            <div class="card-header border-0">
                <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">PAGO DE SUELDO DE LA SECRETARIA</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('sueldosecre/')}}" class="btn btn-sm btn-success">
                        <i class="fas fa-undo"></i>
                        regresar</a>
                </div>
                </div>
            </div>
        <?php $fcha = date("Y-m-d"); ?>
    <form method="post" action="{{ url('/sueldosecre')}}" enctype="multipart/form-data">
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
                                        <select type="text" name="secretaria_id" id="secretaria_id" class="form-control" required>
                                            <option selected disabled value="">seleccione a la secretaria</option>
                                            
                                            @foreach ($secretarias as $secretaria)
                                            <option value="{{ $secretaria->id }}">{{ $secretaria->nombre."-SUELDO : ".$secretaria->sueldo }}</option>
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
                                  
                                        <input type="text" name="fechadesueldo" id="sueldo" class="form-control"  value=""  > 
                                      
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
                                         <a href="{{ url('adelantosecre/') }}" class="btn btn-success text-capitalize">verificar</a>
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

