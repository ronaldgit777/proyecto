@extends('layouts.panel')

@section('content')

<div class="container" >
    <div class="card shadow">
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
    <form method="post" action="{{ url('/inscripcion')}}" enctype="multipart/form-data">
     @csrf   
        <div class="row p-3 mb-2  text-white">
            <div class="col-12"> 
                <div class="m-portlet__body m-portlet--primary" data-portlet="true" m-portlet="true">
                    <div class="form-group m-form__group row">
                           <!--  <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">profesor </label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <select type="text" name="profesor_id" id="profesor_id" class="form-control">
                                            foreach ( //$profesors as $profesor)
                                            <option value=" //$profesor->id }}">// $profesor->apellidopaterno."-".$profesor->apellidomaterno }}</option>
                                            endforeach

                                        </select><br>
                                    </div>
                                </div>
                             </div> -->

                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">asignarproma </label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <select type="text" name="asignarproma_id" id="asignarproma_id" class="form-control">
                                            @foreach ($asignarpromas as $asignarproma)
                                            <option value="{{ $asignarproma->id }}">{{ "materia-".$asignarproma->materia->materia." ".
                                            "costo-".$asignarproma->materia->costo." ".
                                            "profesor-".$asignarproma->profesor->apellidopaterno }}</option>
                                            @endforeach
                                        </select><br>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">alumno </label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <select type="text" name="alumno_id" id="alumno_id" class="form-control">
                                            @foreach ($alumnos as $alumno)
                                            <option value="{{ $alumno->id }}">{{ $alumno->nombre }}</option>
                                            @endforeach
                                        </select><br>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                    <div class="col-4 col-md-3">
                                        <label class="text-primary text-capitalize">turno </label>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <select type="text" name="turno_id" id="turno_id" class="form-control">
                                            @foreach ($turnos as $turno)
                                            <option value="{{ $turno->id }}">{{ $turno->turno }}</option>
                                            @endforeach
                                        </select><br>
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
