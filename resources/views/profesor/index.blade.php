@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center"> LISTA DE PROFESORES</h1>
          <div class="row mt-3">
              <div  class="col-md-4 offset-md-4">
                <div  class="d-grid mx-auto">
                    <a href="{{ url('profesor/create') }}" class="btn btn-primary">registrar nuevo profesor</a>
                   
                </div>
              </div>
          </div>  
      <div class="row mt-3">
          <div  class="">
              <div  class="table-responsive">
                <table class="table table-light table-border table-bordered table-striped ">
                    <thead class="thead-light table-primary">
                        <tr>
                            <th>#</th>
                            <th>fechadeingreso</th>
                            <th>ci</th>
                            <th>nombre</th>
                            <th>apellidopaterno</th>
                            <th>apellidomaterno</th>
                            <th>celular</th>
                            <th>direccion</th>
                            <th>correo</th>
                            <th>estado</th>
                            <th>imagen</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profesors as $profesor)
                        <tr>
                            <td>{{ $profesor->id }}</td>
                            <td>{{ $profesor->fechadeingreso }}</td>
                            <td>{{ $profesor->ci }}</td>
                            <td>{{ $profesor->nombre }}</td>
                            <td>{{ $profesor->apellidopaterno }}</td>
                            <td>{{ $profesor->apellidomaterno }}</td>
                            <td>{{ $profesor->celular }}</td>
                            <td>{{ $profesor->direccion }}</td>
                            <td>{{ $profesor->correo }}</td>
                            <td>{{ $profesor->estado }}</td>
                            <td>
                            <img src="{{ asset('storage').'/'.$profesor->imagen}}" alt=""  width="50px" class="img-thumbnail img-fluid">
                            </td>
                            <td>
                            <a href="{{ url('/profesor/'.$profesor->id.'/edit') }}" method="post">editar</a>//
                            <a href="{{ url('/profesor/'.$profesor->id.'/') }}" method="post">ver</a>     
                                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
     </div>
</div>
@endsection
<!-- boton para el modal 
<div class="row mt-3">
        <div  class="col-md-4 offset-md-4">
          <div  class="d-grid mx-auto">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">
              registrar nuevo profesor</button>
          </div>
        </div>
    </div>  

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE NUEVO PROFESOR</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
           
        <form class="row g-3 needs-validation" novalidate>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip01" class="form-label">fechadeingreso</label>
          <input type="date" class="form-control" id="validationTooltip01"  required>
          <div class="valid-tooltip"> Looks good!</div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip02" class="form-label">ci</label>
          <input type="text" class="form-control" id="validationTooltip02" value="Otto" required>
          <div class="valid-tooltip">Looks good!</div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltipUsername" class="form-label">nombre</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
            <input type="text" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
            <div class="invalid-tooltip">Please choose a unique and valid userna</div>
          </div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip03" class="form-label">apellidpaterno</label>
          <input type="text" class="form-control" id="validationTooltip03" required>
          <div class="invalid-tooltip">Please provide a valid city.</div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip03" class="form-label">apellidomaterno</label>
          <input type="text" class="form-control" id="validationTooltip03" required>
          <div class="invalid-tooltip"> Please provide a valid city.</div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip03" class="form-label">correo</label>
          <input type="text" class="form-control" id="validationTooltip03" required>
          <div class="invalid-tooltip"> Please provide a valid city. </div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip03" class="form-label">celular</label>
          <input type="text" class="form-control" id="validationTooltip03" required>
          <div class="invalid-tooltip">Please provide a valid city.</div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip03" class="form-label">correo</label>
          <input type="text" class="form-control" id="validationTooltip03" required>
          <div class="invalid-tooltip"> Please provide a valid city. </div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip03" class="form-label">direccion</label>
          <input type="text" class="form-control" id="validationTooltip03" required>
          <div class="invalid-tooltip"> Please provide a valid city.
          </div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip04" class="form-label">estado</label>
          <select class="form-select" id="validationTooltip04" required>
            <option selected disabled value="">Choose...</option>
            <option value="activo">activo</option>
            <option value="activo">inactivo</option>
          </select>
          <div class="invalid-tooltip"> Please select a valid state.</div>
        </div>
        <div class="col-md-12 position-relative">
          <label for="validationTooltip03" class="form-label">imagen</label>
          <input type="file" class="form-control" id="validationTooltip03" required>
          <div class="invalid-tooltip"> Please provide a valid city. </div>
        </div>
        <div class="col-12">
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">regresar</button>
              <input type="submit" value="guardar datos" class="btn btn-primary">
                <a href="{{ url('profesor/') }}" >regresar</a> 
                 
            </div>
       </div>
      </form>
      </div>
    </div>
  </div>
</div>
-->
