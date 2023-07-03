@extends('layouts.app')

@section('content')
<!--
<div class="container">
    <h1>REGISTRO DE NUEVO PROFESOR</h1>
                <form method="post" action="{{ url('/profesor')}}" enctype="multipart/form-data">
                @csrf    
                    <label for="fechadeingreso">fechadeingreso</label>
                    <input type="date" name="fechadeingreso" id="fechadeingreso" class="form-control"> <br>
                    <label for="ci">ci</label>
                    <input type="text" name="ci" id="ci" class="form-control"> <br>
                    <label for="nombre">nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"> <br>
                    <label for="apellidopaterno">apellidopaterno</label>
                    <input type="text" name="apellidopaterno" id="apellidopaterno" class="form-control"> <br>
                    <label for="apellidomaterno">apellidomaterno</label>
                    <input type="text" name="apellidomaterno" id="apellidomaterno" class="form-control"><br>
                    <label for="celular">celular</label>
                    <input type="text" name="celular" id="celular" class="form-control"><br>
                    <label for="direccion">direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control"><br>
                    <label for="correo">correo</label>
                    <input type="text" name="correo" id="correo" class="form-control"><br>
                    <label for="estado">estado</label>
                    <input type="text" name="estado" id="estado" class="form-control"> <br>
                    <label for="imagen">imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control"><br>
                    <input type="submit" value="guardar datos" class="btn btn-primary">
                    <a href="{{ url('profesor/') }}" >regresar</a>
                </form>
</div>    
-->
<div class="container " >
<h1 class="text-center"> REGISTRO DE NUEVO PROFESOR</h1>
<?php $fcha = date("Y-m-d"); ?>
    <form method="post" action="{{ url('/profesor')}}" enctype="multipart/form-data">
     @csrf   
        <div class="row p-3 mb-2 bg-dark text-white" >
            <div class="col-12  " > 
                <div class="m-portlet__body m-portlet--primary" data-portlet="true" m-portlet="true">
                    <div class="form-group m-form__group row">
                        
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                         <label class="text-primary text-capitalize">fecha de ingreso</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="date" name="fechadeingreso" id="fechadeingreso" class="form-control" value="<?php echo $fcha; ?>" readonly> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize" >ci</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="ci" id="ci" class="form-control"> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">nombre</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="nombre" id="nombre" class="form-control"> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">apellido paterno</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="apellidopaterno" id="apellidopaterno" class="form-control"> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">apellido materno</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="apellidomaterno" id="apellidomaterno" class="form-control"> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">celular</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="celular" id="celular" class="form-control"> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">direccion</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="direccion" id="direccion" class="form-control"> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">correo</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="correo" id="correo" class="form-control"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">estado</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <select type="text" name="estado" id="estado" class="form-control">
                                            <option value="activo">activo</option>
                                            <option value="inactivo">inactivo</option>
                                        </select><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">imagen</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                     <input type="file" name="imagen" id="imagen" class="form-control"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-12 col-md-12 text-align: center;">
                                        <center><a href="{{ url('profesor/') }}" class="btn btn-info text-capitalize">regresar</a></center> <br>
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