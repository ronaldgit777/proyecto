<h6 class="navbar-heading text-muted">gestion</h6>
<ul class="navbar-nav">
    <li class="nav-item  active ">
      <a class="nav-link  active " href="./index.html">
        <i class="ni ni-tv-2 text-danger"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
    <a class="nav-link nav-link-icon" href="{{url('register')}}">
      <i class="ni ni-circle-08"></i>
      <span class="nav-link-inner--text">usuarios</span>
    </a>
  </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/profesor') }}">
          <i class="fas fa-chalkboard-teacher text-blue"></i> profesores
        </a>
        <a class="nav-link " href="{{ url('/sueldopro') }}">
          <i class="fas fa-chalkboard-teacher text-blue"></i> sueldo
        </a>
        <a class="nav-link " href="{{ url('/detallesupro') }}">
          <i class="fas fa-chalkboard-teacher text-blue"></i> detallesueldo
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/aula') }}">
        <i class="fas fa-stethoscope text-info"></i>aula
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/materia') }}">
        <i class="fas fa-bed text-warning"></i>materia
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/periodo') }}">
        <i class="fas fa-bed text-warning"></i>periodo
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/materia') }}">
        <i class="fas fa-bed text-warning"></i>materia
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/asignarproma') }}">
        <i class="fas fa-bed text-warning"></i>asignarproma
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
  </ul>