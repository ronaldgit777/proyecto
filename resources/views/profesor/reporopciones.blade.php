@extends('layouts.panel')



@section('content')

<style>

    .box {
      width: 200px;
      height: 200px;
      margin: 10px;
      border: 2px solid green;
      box-sizing: border-box;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: bold;
    }

    .top-row,
    .bottom-row {
      display: flex;
      justify-content: center;
      flex-basis: 100%;
    }

    .box img {
      width: 80%;
      height: 60%;
      margin-bottom: 10px;
    }

    .box a {
      padding: 8px 16px;
      font-size: 16px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
    }
  </style>

  <div class="card shadow">
          <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">DIFERENTES TIPOS DE REPORTE DE LOS PROFESORES</h3>
                        </div>
                           
                    </div>

                    <div class="top-row">
                        <div class="box">
                          <img src="imag/listaprofesores.jpg" alt="Imagen 1">
                          <a href="{{ url('/repor-pro') }}">lista de profesores</a>
                        </div>
                        <div class="box">
                          <img src="imag/asigprofesores.jpg" alt="Imagen 2">
                          <a href="{{ url('/reporasig') }}">asignaciones de profesores</a>
                        </div>
                        <div class="box">
                          <img src="imag/adelantopro.jpg" alt="Imagen 3">
                          <a href="{{ url('/reporadepro') }}">adelantos profesores</a>
                        </div>
                      </div>
                      <div class="bottom-row">
                        <div class="box">
                          <img src="imag/pagoprofesor.png" alt="Imagen 4">
                          <a  href="{{ url('/reporsupro') }}">sueldos pagados profesores</a>
                        </div>
                        <div class="box">
                          <img src="imag/alumnosprofe.jpg" alt="Imagen 5">
                          <a  href="{{ url('/reporprofealumno') }}">profesores su lista de alumnos</a>
                        </div>
                        <div class="box">
                          <img src="imag/notaprofesor.png"  alt="nose">
                          <a href="#">profesores su lista de notas</a>
                        </div>
                        
          </div>
     
   </div>
     
@endsection

