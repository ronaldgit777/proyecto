@extends('layouts.panel')

@section('content')
    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                      <div class="col">
                                        <h3 class="mb-0">LISTA DE ADELANTOS DEL PROFESOR
                                            <i class="far fa-calendar-alt  text-blue"></i> 
                                        </h3>
                                        <div class="row">
                                                <div class="col">
                                                    <label class="text-primary text-capitalize">fecha de inicioA</label>
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
                                                     <!--  <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i>Buscar</button>
                                                      </div>  -->
                                                  </div>
                                                </div>
                                                <div class="col">
                                                  <label class="text-primary text-capitalize"></label><br>
                                                  <button class="btn btn-danger" type="button"><i class="fas fa-print"></i>imprimir</button>
                                                </div>  
                                                
                                                <div class="col">
                                                    <label class="text-primary text-capitalize"></label> 
                                                    <a href="{{url('adelantopro/create')}}" class="btn  btn-primary text-capitalize" >
                                                        <i class="fas fa-plus-circle"></i>
                                                        agregar nuevo adelanto</a>
                                                </div>
                                                <div class="col text-right">
                                                    <a href="{{url('home')}}" class="btn btn-sm btn-success" >
                                                        <i class="fas fa-plus-circle"></i>
                                                        regresar</a>
                                              </div>  
                                        </div>
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
                                    <th>estado</th>
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
                                    <td>{{ $adelantopro->estadoade }}</td>
                                    <td>{{ $adelantopro->observacion }}</td>
                                    <td>{{ $adelantopro->profesor_id ."-".$adelantopro->profesor->nombre}}</td>
                                    <td> <a href="{{ url('/adelantopro/'.$adelantopro->id.'/show') }}" method="post">ver</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/pdfmake.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/vfs_fonts.js"></script>
<script>
    var adelantoprosData = {!! json_encode($adelantopros) !!};
    function generarpdflistaadelantopro() {
    // Construir el contenido del reporte utilizando los datos de adelantoprosData
    const filas = [];
    filas.push(['#', 'Fecha de Adelanto', 'Monto', 'Observación', 'Profesor']);
    for (let i = 0; i < adelantoprosData.length; i++) {
      const adelantopro = adelantoprosData[i];
      const id = adelantopro.id;
      const fechaadelantopro = adelantopro.fechaadelantopro;
      const monto = adelantopro.monto;
      const observacion = adelantopro.observacion;
      const profesor_id = adelantopro.profesor_id + "-" + adelantopro.profesor.nombre;
      filas.push([id, fechaadelantopro, monto, observacion, profesor_id]);
    }
   

    // Definir la estructura del documento PDF con estilos para la tabla
    const docDefinition = {
      content: [
        { text: 'Lista de Adelantos del Profesor', style: 'header' },
        {
          table: {
            headers: ['#', 'Fecha de Adelanto', 'Monto', 'Observación', 'Profesor'],
            body: filas,
          },
          // Estilo para la cabecera de la tabla
          headerRows: 1,
          fillColor: '#2c6aa6', // Color de fondo azul para la cabecera
        },
      ],
      styles: {
        header: { fontSize: 18, bold: true, margin: [0, 0, 0, 10] },
      },
      // Estilo para las celdas del cuerpo de la tabla
      defaultStyle: { fillColor: '#bdd7e7' }, // Color de fondo azul claro para las celdas
    };

    // Generar el documento PDF
    pdfMake.createPdf(docDefinition).download('reporte_adelantos.pdf');
  }
</script>
@endsection