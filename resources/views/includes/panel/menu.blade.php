<h6 class="navbar-heading text-muted">gestion</h6>
<ul class="navbar-nav ">
    <li class="nav-item  active ">
      <a class="nav-link  active " href="./index.html">
        <i class="ni ni-tv-2 text-danger"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/user') }}">
        <i class="fas fa-university text-info"></i>usuarios
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/secretaria') }}">
        <i class="fas fa-university text-info"></i>secretarias
      </a>
    </li>  
 

    <li class="nav-item">
      <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
          <i class="fab fa-laravel" style="color: #f4645f;"></i>
          <span class="nav-link-text" style="color: #f4645f;">{{ __('PROFESOR') }}</span>
      </a>

      <div class="collapse show" id="navbar-examples">
          <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                  <a class="nav-link " href="{{ url('/profesor') }}">
                    <i class="fas fa-chalkboard-teacher text-blue"></i> profesores
                  </a>      
              </li>
              <li class="nav-item">
                  <a class="nav-link " href="{{ url('/sueldopro') }}">
                    <i class="fas fa-donate text-blue"></i> sueldo profesor
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link " href="{{ url('/detallesupro') }}">
                    <i class="fas fa-chalkboard-teacher text-blue"></i> detallesueldo
                  </a>
              </li>
          </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link " href="{{ url('/periodo') }}">
        <i class="far fa-calendar-alt text-success"></i>periodo
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/aula') }}">
        <i class="fas fa-university text-info"></i>aula
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/materia') }}">
        <i class="fas fa-book text-warning"></i>materia
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/asignarproma') }}">
        <i class="fas fa-bed text-warning"></i>asignar materia
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/alumno') }}">
        <i class="fas fa-bed text-warning"></i>alumnos
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/inscripcion') }}">
        <i class="fas fa-bed text-warning"></i>inscripcion
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/actividad') }}">
        <i class="fas fa-bed text-warning"></i>actividad
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/notas') }}">
        <i class="fas fa-bed text-warning"></i>notas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('logout')}}"
        onclick="event.preventDefault(); document.getElementById('formlogout').submit();">
        <i class="fas fa-sign-in-alt"></i> cerrar secion
      </a>
      <form action="{{route('logout')}}" method="POST" style="display: none" id="formlogout" >
        @csrf
        </form>
    </li>
  </ul>
  <!-- Divider -->
  <hr class="my-3">
  <!-- Heading -->
  <h6 class="navbar-heading text-muted">reportes</h6>
  <!-- Navigation -->
  <ul class="navbar-nav mb-md-3">
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="ni ni-books text-default"></i>citas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="ni ni-chart-bar-32"></i> desempeño medico
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link nav-link-icon" href="{{url('register')}}">
        <i class="ni ni-circle-08"></i>
        <span class="nav-link-inner--text">registrar usuario</span>
      </a>
    </li>
  </ul>