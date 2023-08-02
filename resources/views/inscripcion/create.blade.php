@extends('layouts.panel')

@section('content')

<div class="container" >
    <div class="card shadow p-3 mb-2 bg-info text-white">
            <div class="card-header border-0">
                <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">REGISTRAR NUEVA INSCRIPCION</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('inscripcion/')}}" class="btn btn-sm btn-success">
                        <i class="fas fa-undo"></i>
                        regresar</a>
                </div>
                </div>
            </div>
        <?php $fcha = date("Y-m-d"); ?>
    <form method="post" action="{{ url('/inscripcion')}}" enctype="multipart/form-data">
     @csrf   
        <div class="row p-3 mb-2  text-white">
            <div class="col-12"> 
                <div class="m-portlet__body m-portlet--primary" data-portlet="true" m-portlet="true">
                    <div class="form-group m-form__group row">

                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text text-capitalize">fecha de inscripcion</label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input class="form-control" placeholder="fechadeinscripcion" type="date" name="fechadeinscripcion"  value="<?php echo $fcha; ?>" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text text-capitalize">profesor </label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <select type="text" name="asignarproma_id" id="asignarproma_id" class="form-control" required>
                                            <option selected disabled value="">seleccione el profesor</option>
                                            @foreach ($asignarpromas as $asignarproma)
                                            <option value="{{ $asignarproma->id }}">{{ $asignarproma->profesor->nombre."-materia-".$asignarproma->materia->materia
                                                ."-costo-".$asignarproma->materia->costo}}</option>
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
                                        <select type="text" name="" id="" class="form-control" required>
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
                                        <label class="text text-capitalize">periodo </label>
                                    </div>
                                    <div class="col-8 col-md-9">    
                                        <select type="text" name="" id="" class="form-control" required>
                                            <option selected disabled value="">seleccione el periodo</option>
                                            @foreach ($periodos as $periodo)
                                            <option value="{{ $periodo->id }}">{{ $periodo->periodo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text text-capitalize">costo </label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <input type="text"  id="costomateria" class="form-control"  value=""  readonly> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text text-capitalize">aula </label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <select type="text" name="" id="" class="form-control" required>
                                            <option selected disabled value="">seleccione el aula</option>
                                            @foreach ($aulas as $aula)
                                            <option value="{{ $aula->id }}">{{ $aula->aula }}</option>
                                            @endforeach
                                        </select>
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
