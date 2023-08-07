@extends('layouts.panel')

@section('content')

<div class="container" >
    <div class="card shadow p-3 mb-2 bg-info text-white">
            <div class="card-header border-0">
                <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">REGISTRAR NUEVA nota</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('nota/')}}" class="btn btn-sm btn-success">
                        <i class="fas fa-undo"></i>
                        regresar</a>
                </div>
                </div>
            </div>
        <?php $fcha = date("Y-m-d"); ?>
    <form method="post" action="{{ url('/inscripcion')}}" enctype="multipart/form-data">
     @csrf   
     <input type="text"  id="asignarproma_id"  name="asignarproma_id" class="d-none"  value=""  readonly> 
        <div class="row p-3 mb-2  text-white">
            <div class="col-12"> 
                <div class="m-portlet__body m-portlet--primary" data-portlet="true" m-portlet="true">
                    <div class="form-group m-form__group row">

                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text text-capitalize">fecha de nota</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input class="form-control" placeholder="fechadenota" type="date" name="fechadenota"  value="<?php echo $fcha; ?>" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text text-capitalize">actividad </label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                       
                                        <select type="text"  id="actividad_id" class="form-control" required>
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
                                        <select type="text"  id="materia_id" class="form-control" required >
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
                                        <input class="form-control" placeholder="ingrese la nota" type="text" name="nota"  required >
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text text-capitalize">alumno</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <select type="text" name="alumno_id" id="alumno_id" class="form-control" required>
                                            <option selected disabled value="">seleccione el alumno</option>
                                            @foreach ($alumnos as $alumno)
                                            <option value="{{ $alumno->id }}">{{ $alumno->nombre."-".$alumno->apellidopaterno }}</option>
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
                                        <select type="text" name="estado" id="estado" class="form-control" required>
                                            <option value="activo">activo</option> 
                                            <option value="inactivo">inactivo</option> 
                                            </select><br>
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
@endsection