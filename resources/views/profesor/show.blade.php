@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center">VER DATOS DEL PROFESOR</h1>
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
                            <a href="{{ url('/profesor/') }}" method="post">retroceder</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
     </div>
</div>
@endsection