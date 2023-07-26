@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">LISTA DE DATOS</h3>
                    <div class="row">
                            <div class="col">
                                <label class="text-primary text-capitalize">fecha de inicio</label>
                                <input type="date" name="fechainicio" id="fechainicio" class="form-control" >
                                <span class="text-muted">desde</span>
                            </div>
                            <div class="col">
                                <label class="text-primary text-capitalize">fecha de final</label>
                                <input type="date" name="fechafinal" id="fechafinal" class="form-control">
                                <span class="text-muted">hasta</span>
                            </div>
                            <div class="col-md-4">
                              <label class="text-primary text-capitalize">Buscar</label>
                              <div class="input-group">
                                <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Ingrese término de búsqueda">
                                  <div class="input-group-append">
                                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i>Buscar</button>
                                  </div>
                              </div>
                            </div>
                            <div class="col">
                              <label class="text-primary text-capitalize">presione el boton</label><br>
                              <button class="btn btn-danger" type="button"><i class="fas fa-print"></i>imprimir</button>
                            </div>  
                            <div class="col text-right">
                              <a href="{{url('reporopciones')}}" class="btn btn-sm btn-success" >
                              <i class="fas fa-plus-circle"></i>
                              regresar</a>
                          </div>  
                    </div>
                </div>
      </div>
    </div>
  <div class="table-responsive">
    <!-- Projects table -->
    <table id="tabla_id" class="table align-items-center table-flush" >
      <thead class="thead-light">
        <tr>
          <th scope="col">id</th>
          <th scope="col">fechadeingreso</th>
          <th scope="col">ci</th>
          <th scope="col">nombre</th>
          <th scope="col">apellidopaterno</th>
          <th scope="col">apellidomaterno</th>
          <th scope="col">celular</th>
          <th scope="col">direccion</th>
          <th scope="col">correo</th>
          <th scope="col">estado</th>
          <th scope="col">imagen</th>
          <th scope="col">sueldo</th>
          <th scope="col">rol</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($profesors as $profesor)
                  <tr>
                      <td scope="row">{{ $profesor->id }}</td>
                      <td>{{ $profesor->fechadeingreso }}</td>
                      <td>{{ $profesor->ci }}</td>
                      <td>{{ $profesor->nombre }}</td>
                      <td>{{ $profesor->apellidopaterno }}</td>
                      <td>{{ $profesor->apellidomaterno }}</td>
                      <td>{{ $profesor->celular }}</td>
                      <td>{{ $profesor->direccion }}</td>
                      <td>{{ $profesor->user->email }}</td>
                      <td>{{ $profesor->estado }}</td>
                      <td>
                      <img src="{{ asset('storage').'/'.$profesor->imagen}}" alt=""  width="50px"  height="50px" class="img-thumbnail img-fluid">
                      </td>
                      <td>{{ $profesor->sueldo }}</td>
                      <td>{{ $profesor->user->role }}</td>
                  </tr>
                  @endforeach
      </tbody>
    </table>
    ---
    
  </div>
</div>
@endsection
