
<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
      <h6 class="text-overflow m-0">bienvenidos</h6>
    </div>
    <a href="" class="dropdown-item">
      <i class="ni ni-single-02"></i>
      <span>mi perfil</span>
    </a>
    <div class="dropdown-divider"></div>
    <a href=""{{route('logout')}}"
    onclick="event.preventDefault(); document.getElementById('formlogout').submit();"" class="dropdown-item">
      <i class="ni ni-user-run"></i>
      <span>cerrar secion</span>
      <form action="{{route('logout')}}" method="POST" style="display: none" id="formlogout" >
        @csrf
        </form>
    </a>
  </div>