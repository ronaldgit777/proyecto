@extends('layouts.panel')



@section('content')

  <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">LISTA DE TODOS LOS PROFESORES</h3>
              </div>
              <div class="col text-right">
                <a href="{{url('profesor/create')}}" class="btn btn-sm btn-primary" >
                <i class="fas fa-plus-circle"></i>
                NUEVO PROFESOR</a>
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
                <th scope="col">acciones</th>
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
                            <td>
                            <a href="{{ url('/profesor/'.$profesor->id.'/edit') }}" method="post" class="btn btn-sm btn-primary">
                              <i class="fas fa-edit"></i>
                              editar</a>//
                            <a href="{{ url('/profesor/'.$profesor->id.'/') }}" method="post" class="btn btn-sm btn-danger">
                              <i class="far fa-eye"></i>
                              ver</a>     
                                                
                            </td>
                        </tr>
                        @endforeach
            </tbody>
          </table>
        </div>
   </div>

      @section('js')
      <script src"https://code.jquery.com/jquery-3.7.0.js"></script>
      <script src"https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
      <script src"https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
      <script>
        $(document).ready(function() {
                $('#articulos').DataTable();
            });
      </script>
     
      @endsection
@endsection

