@extends('layouts.panel')


@section('content')
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">LISTA DE AULAS 
                  <i class="far fa-calendar-alt  text-blue"></i>
              </h3>
              <div class="row">
                      <div class="col">
                        <label class="text-primary text-capitalize">Buscar</label>
                        <div class="input-group">
                          <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Ingrese término de búsqueda">
                           <!--  <div class="input-group-append">
                              <button class="btn btn-primary" type="button"><i class="fas fa-search"></i>Buscar</button>
                            </div>  -->
                        </div>
                      </div>
                      <div class="col text-right">
                        <button class="btn btn-danger" type="button"><i class="fas fa-print"></i>imprimir</button>
                        <a href="{{url('aula/create')}}" class="btn  btn-primary text-capitalize" >
                            <i class="fas fa-plus-circle"></i>
                            agregar nueva aula</a>
                    </div>  
              </div>
          </div>
      </div>
  </div>
        <div class="table-responsive">
            <table  id="" class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  {{-- <th scope="col">#</th> --}}
                  <th scope="col">aula</th>
                  <th scope="col">estado</th>
                  <th scope="col">acciones</th>
                </tr>
              </thead>
              <tbody id="tabla_aula">
                  @foreach ($aulas as $aula)
                  <tr>
                      {{-- <td>{{ $aula->id }}</td> --}}
                      <td>{{ $aula->aula }}</td>
                      <td>{{ $aula->estado }}</td>
                      <td>
                      <a href="{{ url('/aula/'.$aula->id.'/edit') }}" method="post" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i></a>
                      <a href="{{ url('/aula/'.$aula->id.'/') }}" method="post" class="btn btn-sm btn-danger">
                        <i class="far fa-eye"></i></a> 
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
   </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/pdfmake.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/vfs_fonts.js"></script>
<script>
 $(document).ready(function() {
  
     $('#buscar').on('input', function() {
         var buscar = $(this).val(); 
         generartabla(buscar);      
      
     });
     function generartabla(buscar) {
           $.ajax({
                 url: '{{ url("buscar-aulas") }}', // Ruta a tu controlador Laravel
                 type: 'POST',
                 data: {
                     buscaraula: buscar,// Enviar el ID del aula seleccionada
                     _token: '{{ csrf_token() }}' // Agregar el token CSRF
                 },
                 success: function(response) {
                     // Limpiar el campo de selección de periodos
                     $('#tabla_aula').empty();
                   // profesorreporte=[];
                     $.each(response, function(key, value) {
                         // alert(value.id)
                         $('#tabla_aula').append(
                             '<tr>'+
                             // ' <td>'+value.id+'</td>'+
                                 '<td>'+value.aula+'</td>'+
                                 ' <td>'+value.estado+'</td>'+
                                // ' <td>'+value.role+'</td>'+
                                 ' <td>'+
                                   '<a href="/proyecto/public/aula/' + value.id + '/edit" method="post" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i></a>' +
                                   '<a href="/proyecto/public/aula/' + value.id + '/" method="post" class="btn btn-sm btn-danger"> <i class="far fa-eye"></i></a>'+
                                 ' </td>'+
                             ' </tr>'
                         );
                         //alert(value.id);
                        // profesorreporte.push(encontrarListaPorId(value.id)); //añadiendo elemtos a la nueva variable
                        // $('#miadelanto').find('td').css('border', '1px solid black');
                     });
                 }
             });
     }
 });
</script>
@endsection