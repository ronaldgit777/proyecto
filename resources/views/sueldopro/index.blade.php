@extends('layouts.panel')

@section('content')



<div class="container">
  <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">LISTA DE PAGO DE SUELDOS DE LOS PROFESORES
                      <i class="fas fa-donate text-blue"></i> 
                  </h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('sueldopro/create') }}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i> registrar nuevo pago</a>
                     <!--empeiza el modal-->

                      <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> <i class="fas fa-plus-circle"></i> registrar nuevo pago modal</a>
                      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content p-3 mb-2 bg-info ">
                            <div class="modal-body ">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <div class="card shadow shadow p-3 mb-2 bg-info text-white">
                                <div class="card-header border-0">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="mb-0">PAGO DE SUELDO DEL PROFESOR</h3>
                                        </div>
                                        <div class="col text-right">
                                            <a href="{{url('sueldopro/')}}" class="btn btn-sm btn-success">
                                                <i class="fas fa-undo"></i>
                                                regresar</a>
                                        </div>
                                    </div>
                                </div>
                            <?php $fcha = date("Y-m-d"); ?>
                                <form method="post" action="{{ url('/sueldopro')}}" enctype="multipart/form-data">
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
                                                                    <select type="text" name="profesor_id" id="profesor_id" class="form-control" required>
                                                                        <option selected disabled value="">seleccione al profesor</option>
                                                                        
                                                                        @foreach ($profesors as $profesor)
                                                                        <option value="{{ $profesor->id }}">{{ $profesor->nombre."-SUELDO : ".$profesor->sueldo }}</option>
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
                                                              
                                                                    <input type="text" name="sueldo" id="sueldo" class="form-control"  value=""  > 
                                                                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-md-6">
                                                            <div class="form-group m-form__group row" style="display: flex; margin-left: 2px">
                                                                <div class="col-4 col-md-3">
                                                                    <label class="text text-capitalize">total adelantos</label>
                                                                </div>
                                                                <div class="col-8 col-md-6">
                                                                    <input type="text" name="totaldescuento" id="totaldescuento" class="form-control" > <br>
                                                                  
                                                                </div>
                                                                <div class="col-8 col-md-3">
                                                                    <a href="{{ url('adelantopro/') }}" class="btn btn-success btn-sm text-capitalize">verificar</a>
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
                          </div>
                        </div>
                      </div>
                  <!--filaliza el modal-->

                </div>
              </div>
            </div>



            
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                             <th>#</th>
                            <th scope="col"> fechadesueldo</th>
                            <th scope="col"> mesdepago</th>
                            <th scope="col">sueldo</th>
                            <th scope="col">totaldescuento</th>
                            <th scope="col">totalpago</th>
                            <th scope="col">observacion</th>
                            <th scope="col">profesor_id</th>
                            <th scope="col">acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sueldopros as $sueldopro)
                        <tr>
                            <td>{{ $sueldopro->id }}</td>
                            <td>{{ $sueldopro->fechadesueldo }}</td>
                            <td>{{ $sueldopro->mesdepago }}</td>
                            <td>{{ $sueldopro->profesor->sueldo }}</td>
                            <td>{{ $sueldopro->totaldescuento }}</td>
                            <td>{{ $sueldopro->totalpago }}</td>
                            <td>{{ $sueldopro->observacion }}</td>
                            <td>{{ $sueldopro->profesor->nombre }}</td>
                            <td> <a href="{{ url('/sueldopro/'.$sueldopro->id.'/show') }}" method="post">imprimir</a>
                            </td>           
                            </td>
                        </tr>
                @endforeach
            </tbody>
          </table>
        </div>
   </div>
</div>
@endsection
