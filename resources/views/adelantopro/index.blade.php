@extends('layouts.panel')

@section('content')
<div class="container">
    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                    <div class="col">
                                    <h3 class="mb-0">LISTA DE ADELANTOS DEL PROFESOR
                                        <i class="far fa-calendar-alt  text-blue"></i> 
                                    </h3>
                                    </div>
                                <div class="col text-right">
                                        <a href="{{ url('adelantopro/create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> adelanto</a>
                                            <!--empeiza el modal-->
                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> <i class="fas fa-plus-circle"></i> registrar nuevo adelanto modal</a>
                                        <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg " role="document">
                                            <div class="modal-content p-3 mb-2 bg-info">
                                                <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="card shadow p-3 mb-2 bg-info text-white">
                                                    <div class="card-header border-0">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h3 class="mb-0">REGISTRO DEL ADELANTO </h3>
                                                            </div>
                                                            <div class="col text-right">
                                                                <a href="{{url('adelantopro/')}}" class="btn btn-sm btn-success">
                                                                    <i class="fas fa-undo"></i>
                                                                    regresar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php $fcha = date("Y-m-d"); ?>
                                                <form method="post" action="{{ url('/adelantopro')}}" enctype="multipart/form-data">
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
                                                                                <input class="form-control" placeholder="fechaadelantopro" type="date" name="fechaadelantopro"  value="<?php echo $fcha; ?>"  >
                                                                                </div>
                                                                        </div>
                                                                        </div>
                                            
                                                                        <div class="col-12 col-sm-12 col-md-6">
                                                                        <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                                                            <div class="col-4 col-md-3">
                                                                                <label class="text text-capitalize" >monto</label>
                                                                            </div>
                                                                            <div class="col-8 col-md-9">
                                                                                <input class="form-control" placeholder="monto " type="text" name="monto" required autocomplete="monto">
                                                                            
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-12 col-sm-12 col-md-6">
                                                                        <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                                                            <div class="col-4 col-md-3">
                                                                                <label class="text text-capitalize">observacion</label>
                                                                            </div>
                                                                                <div class="col-8 col-md-9">
                                                                                <input class="form-control" placeholder="observacion" type="observacion" name="observacion" required autocomplete="observacion">
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
                                            </div>
                                        </div>
                    <!--filaliza el modal-->
                                </div>
                            </div>
                        </div>
                        
                    <div  class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>fechadesupre</th>
                                    <th>monto</th>
                                    <th>observacion</th>
                                    <th>profesor_id</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($adelantopros as $adelantopro)
                                <tr>
                                    <td>{{ $adelantopro->id }}</td>
                                    <td>{{ $adelantopro->fechaadelantopro }}</td>
                                    <td>{{ $adelantopro->monto }}</td>
                                    <td>{{ $adelantopro->observacion }}</td>
                                    <td>{{ $adelantopro->profesor_id ."-".$adelantopro->profesor->nombre}}</td>
                                    <td></td>
                                    <td> <a href="{{ url('/adelantopro/'.$adelantopro->id.'/show') }}" method="post">ver</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        
     </div>
</div>
@endsection