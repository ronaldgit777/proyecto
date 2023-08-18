@extends('layouts.panel')

@section('content')

<div class="container">
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">{{ __('MENSAJE DE BIENVENIDA') }}</div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  {{ __('BIENVENIDO AL SISTEMA DE CONTROL DE REGISTROS TEL C') }}
              </div>
           </div>
        </div>
     </div>
</div>
</div>
@endsection
