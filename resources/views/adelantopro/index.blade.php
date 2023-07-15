@extends('layouts.panel')

@section('content')
<div class="container">
    <div class="card shadow">
                        <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                            <h3 class="mb-0">LISTA DE ADELANTOS
                                <i class="far fa-calendar-alt  text-blue"></i> 
                            </h3>
                            </div>
                            <div class="col text-right">
                            <a href="{{ url('adelantopro/create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> registrar nuevo adelanto</a>
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
                            <th>observacion</th>
                            <th>profesor_id</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adelantopros as $adelantopro)
                        <tr>
                            <td>{{ $adelantopro->id }}</td>
                            <td>{{ $adelantopro->fechadetallesupro }}</td>
                            <td>{{ $adelantopro->monto }}</td>
                            <td>{{ $adelantopro->observacion }}</td>
                            <td>{{ $adelantopro->profesor_id }}</td>
                            <td></td>
                            <td> <a href="{{ url('/adelantopro/'.$adelantopro->id.'/show') }}" method="post">ver</a>
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