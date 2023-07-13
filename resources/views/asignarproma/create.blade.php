@extends('layouts.panel')

@section('content')

<div class="container" >
    <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Asignar materia a profesor</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('asignarproma/')}}" class="btn btn-sm btn-success">
                        <i class="fas fa-undo"></i>
                        regresar</a>
                </div>
                </div>
            </div>
    <form method="post" action="{{ url('/asignarproma')}}" enctype="multipart/form-data">
     @csrf   
        <div class="row p-3 mb-2  text-white">
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
                                            <option value="{{ $profesor->id }}">{{ $profesor->nombre."-".$profesor->apellidopaterno }}</option>
                                            @endforeach

                                        </select><br>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">materias </label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <select type="text" name="materia_id" id="materia_id" class="form-control">
                                            @foreach ($materias as $materia)
                                            <option value="{{ $materia->id }}">{{ $materia->materia }}</option>
                                            @endforeach
                                        </select><br>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">aula </label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <select type="text" name="aula_id" id="aula_id" class="form-control">
                                            @foreach ($aulas as $aula)
                                            <option value="{{ $aula->id }}">{{ $aula->aula }}</option>
                                            @endforeach
                                        </select><br>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">periodo </label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <select type="text" name="periodo_id" id="periodo_id" class="form-control">
                                            @foreach ($periodos as $periodo)
                                            <option value="{{ $periodo->id }}">{{ $periodo->periodo }}</option>
                                            @endforeach
                                        </select><br>
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
</div>
@endsection
