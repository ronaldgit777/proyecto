  <h1 class="navbar-heading text-muted">
    @if(auth()->user()->role == 'admin')
        bienvenido admin
      @elseif(auth()->user()->role == 'secretaria')
          bienvenido secretaria
      @else 
          bienveido profesor
     @endif</h1>
    @if(auth()->user()->role == 'admin')
        <ul class="navbar-nav  ">
          
                <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="{{url('registroEmpleado')}}">
                    <i class="fas fa-users"></i>
                    <span class="nav-link-inner--text">registrar empleado-usuario</span>
                  </a>
                </li>
                  <li class="nav-item">
                      <a class="nav-link active" href="#navbar-examples1" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples1">
                          <i class="far fa-id-badge text-info" style="color: #f4645f;"></i>
                          <span class="nav-link-text" style="color: #124ad88e;">{{ __('SECRETARIA') }}</span>
                      </a>

                      <div class="collapse show" id="navbar-examples1">
                          <ul class="nav nav-sm flex-column">
                              <li class="nav-item">
                                <a class="nav-link " href="{{ url('/secretaria') }}">
                                  <i class="fas fa-university text-info"></i>secretarias
                                </a>
                              </li> 
                              <li class="nav-item">
                                <a class="nav-link " href="{{ url('/adelantosecre') }}">
                                  <i class="fas fa-hand-holding-usd text-info"></i> adelanto
                                </a>
                            </li>
                              <li class="nav-item">
                                  <a class="nav-link " href="{{ url('/sueldosecre') }}">
                                    <i class="fas fa-donate text-info"></i>pagar sueldo
                                  </a>
                              </li>
                            
                          </ul>
                      </div>
                </li>
            <li class="nav-item">
              <b><a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                  <i class="fas fa-chalkboard" style="color: #09bb4d;"></i>
                  <span class="nav-link-text" style="color: #09bb4d;">{{ __('PROFESOR') }}</span>
              </a></b>

              <div class="collapse show" id="navbar-examples">
                  <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                          <a class="nav-link " href="{{ url('/profesor') }}">
                            <i class="fas fa-chalkboard-teacher text-success"></i> profesores
                          </a>      
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " href="{{ url('/adelantopro') }}">
                          <i class="fas fa-hand-holding-usd text-success"></i> adelanto
                        </a>
                    </li>
                      <li class="nav-item">
                          <a class="nav-link " href="{{ url('/sueldopro') }}">
                            <i class="fas fa-donate text-success"></i>pagar sueldo
                          </a>
                      </li>
                    
                  </ul>
              </div>
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
              <a class="nav-link " href="{{ url('/periodo') }}">
                <i class="	far fa-clock"></i>periodo
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/asignarproma') }}">
                <i class="fas fa-chalkboard-teacher text-blue"></i>asignar materia
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/alumno') }}">
                <i class="fas fa-user-graduate"></i>alumnos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/inscripcion') }}">
                <i class="far fa-map"></i>inscripcion
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/actividad') }}">
                <i class="fas fa-table"></i>actividad
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/notas') }}">
                <i class="fas fa-calculator text-success"></i>notas
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
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">reportes</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
              <li class="nav-item">
                <a class="nav-link active" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples2">
                    <i class="	far fa-sticky-note text-info" style="color: #f4645f;"></i>
                    <span class="nav-link-text" style="color: #124ad88e;">{{ __('REPORTES') }}</span>
                </a>

                <div class="collapse show" id="navbar-examples2">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a class="nav-link " href="{{ url('/reporsecretarias') }}">
                            <i class="fas fa-university text-info"></i>secretarias
                          </a>
                        </li> 
                        <li class="nav-item">
                          <a class="nav-link " href="{{ url('/reporopciones') }}">
                            <i class="fas fa-chalkboard-teacher text-blue"></i> profesores
                          </a>
                      </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/reporalumnos') }}">
                              <i class="fas fa-user-graduate"></i>alumnos
                            </a>
                        </li>
                      
                    </ul>
                </div>
          </li>
        </ul>
   <!-- secretaria -->
 @elseif(auth()->user()->role == 'secretaria')

    <!-- profesor -->
      @else
      <ul class="navbar-nav ">
          
           <li class="nav-item">
            <a class="nav-link " href="{{ url('/asigpro') }}">
            <i class="fas fa-bed text-warning"></i>
            <span class="nav-link-inner--text">ver materias asisgnadas</span>
            </a>
          </li>
             
        <li class="nav-item">
          <a class="nav-link " href="{{ url('/alumpro') }}">
            <i class="fas fa-university text-info"></i>alumnos
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
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">reportes</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">
      <li class="nav-item">
        <a class="nav-link nav-link-icon" href="{{url('registroEmpleado')}}">
          <i class="ni ni-circle-08"></i>
          <span class="nav-link-inner--text">reportes</span>
        </a>
      </li>
    </ul>
@endif 
  <!-- Divider -->

   