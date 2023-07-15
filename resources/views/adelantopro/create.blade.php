@extends('layouts.panel')

@section('content')

<div class="container" >
    <div class="card shadow p-3 mb-2 bg-info text-white">
            <div class="card-header border-0">
                <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">REGISTRAR NUEVO ADELANTO</h3>
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
                                    <input class="form-control" placeholder="fechadeadelanto" type="date" name="fechadeadelanto"  value="<?php echo $fcha; ?>"  >
                                  </div>
                            </div>
                          </div>

                          <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                <div class="col-4 col-md-3">
                                    <label class="text text-capitalize" >monto</label>
                                </div>
                                <div class="col-8 col-md-9">
                                    <input class="form-control" placeholder="monto " type="text" name="monto" required autocomplete="new-password">
                               
                                </div>
                              </div>
                          </div>

                          <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                <div class="col-4 col-md-3">
                                    <label class="text text-capitalize">observacion</label>
                                </div>
                                  <div class="col-8 col-md-9">
                                    <input class="form-control" placeholder="observacion" type="observacion" name="observacion" required autocomplete="new-password">
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
@endsection
