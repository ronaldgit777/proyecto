@extends('layouts.panel')
@section('content')
<div class="container" >
    <div class="card shadow  p-3 mb-2 bg-info text-white">
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
                                    <label class=" text-capitalize">profesor </label>
                                </div>
                                <div class="col-8 col-md-9">
                                    <select type="text" name="profesor_id" id="profesor_id" class="form-control">
                                        @php
                                        $maximoPeriodos = $periodos->count();
                                    @endphp

                                        @foreach ($profesors as $profesor)
                                        @php
                                            $contpro = $asignarpromas->where('profesor_id', $profesor->id)->count();
                                        @endphp

                                        @if ($contpro < $maximoPeriodos)
                                        <option value="{{ $profesor->id }}">{{ $profesor->nombre."-".$profesor->apellidopaterno }}</option>
                                        @endif
                                    @endforeach
                                    </select><br>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                <div class="col-4 col-md-3">
                                    <label class=" text-capitalize">materias </label>
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
                                    <label class="text text-capitalize">aula</label>
                                </div>
                                <div class="col-8 col-md-9">
                                    <select type="text" name="aula_id" id="aula_id" class="form-control">
                                    @php
                                        $maximoPeriodos = $periodos->count();
                                    @endphp

                                    @foreach ($aulas as $aula)
                                        @php
                                            $contAula = $asignarpromas->where('aula_id', $aula->id)->count();
                                        @endphp

                                        @if ($contAula < $maximoPeriodos)
                                            <option value="{{ $aula->id }}">{{ $aula->aula }}</option>
                                        @endif
                                    @endforeach
                                    </select><br>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                <div class="col-4 col-md-3">
                                    <label class="text text-capitalize">periodo </label>
                                </div>
                                <div class="col-8 col-md-9">
                                    <select type="text" name="periodo_id" id="periodo_id" class="form-control">
                                    @foreach ($periodos as $periodo)
                                        @php
                                            $bandPeriodo = $asignarpromas->where('aula_id', 1)->where('periodo_id', $periodo->id)->isEmpty();
                                        @endphp

                                        @if ($bandPeriodo)
                                            <option value="{{ $periodo->id }}">{{ $periodo->periodo }}</option>
                                        @endif
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

                @if(Session::has('registro_duplicado'))
                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ Session::get('registro_duplicado') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</form>
</div>
</div>
@endsection