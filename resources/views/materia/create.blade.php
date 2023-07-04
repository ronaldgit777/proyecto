@extends('layouts.panel')

@section('content')

<div class="container " >
<h1 class="text-center"> REGISTRO DE NUEVA MATERIA</h1>

    <form method="post" action="{{ url('/materia')}}" enctype="multipart/form-data">
     @csrf   
        <div class="row p-3 mb-2 bg-dark text-white"   >
            <div class="col-12"> 
                <div class="m-portlet__body m-portlet--primary" data-portlet="true" m-portlet="true">
                    <div class="form-group m-form__group row">
                        
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">

                                    <div class="col-4 col-md-3">
                                         <label class="text-primary text-capitalize">materia</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="materia" id="materia" class="form-control" > <br>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px"> 
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">costo</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text" name="costo" id="costo" class="form-control"> <br>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12">
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
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="form-group m-form__group row " style="display: flex; margin-left: 2px"> 
                                    
                                    <div class="col-6 col-md-6 ">
                                          <a href="{{ url('materia/') }}" class="btn btn-info text-capitalize">regresar</a> 
                                     </div>

                                    <div class="col-6 col-md-6 ">
                                            <input type="submit" value="guardar datos" class="btn btn-primary">
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
