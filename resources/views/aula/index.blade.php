@extends('layouts.panel')

@section('css')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
<div class="container">
  <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">LISTA DE AULAS
                    <i class="fas fa-university text-blue"></i> 
                </h3>
              </div>
              <div class="col text-right">
                <a href="{{ url('aula/create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> registrar nueva aula</a>
              </div>
            </div>
          </div>
        <div class="table-responsive">
          <!-- Projects table -->
                  <div class="card">
                    <div class="card-body">
                    
                  
                  <table  id="example" class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">aula</th>
                        <th scope="col">estado</th>
                        <th scope="col">acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($aulas as $aula)
                        <tr>
                            <td>{{ $aula->id }}</td>
                            <td>{{ $aula->aula }}</td>
                            <td>{{ $aula->estado }}</td>
                            <td>
                            <a href="{{ url('/aula/'.$aula->id.'/edit') }}" method="post" class="btn btn-sm btn-primary">
                              <i class="fas fa-edit"></i>
                              editar</a>//
                            <a href="{{ url('/aula/'.$aula->id.'/') }}" method="post" class="btn btn-sm btn-danger">
                              <i class="far fa-eye"></i>
                              ver</a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                    </div>
                  </div>
        </div>
   </div>
</div>
@endsection
@section('js')

<script src=" https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js "></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js "></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js "></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js "></script>
<script >
  new DataTable('#example', {
    responsive: true,
    autoWidth:false,
      
    "pageLength": 2,
    lengthMenu:[
      [2,10,25,50],
      [2,10,25,50]
    ],
    "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
});



</script>
@endsection