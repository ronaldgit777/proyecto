@extends('layouts.panel')

@section('content')
  <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">DATOS DEL PROFESOR</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('profesor/')}}" class="btn btn-sm btn-success">
                <i class="fas fa-undo"></i>
                regresar</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th colspan="col">#</th>
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
                            <IMPRIMIR href="{{ url('/profesor/') }}" method="post" class="btn btn-sm btn-danger">
                                <i class="fas fa-external-link-alt"></i>
                                IMPRIMIR</a>
                            </td>
                        </tr>
            </tbody>
          </table>
        </div>
      </div>
@endsection

