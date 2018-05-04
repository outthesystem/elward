<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ secure_asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ secure_asset('public/js/tether.min.js') }}"></script>
    <script src="{{ secure_asset('public/js/pace.min.js') }}"></script>
      <script src="{{ secure_asset('public/js/popper.min.js') }}"></script>
      <script src="{{ secure_asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('public/js/app.js') }}"></script>
    <script src="{{ secure_asset('public/js/angular.min.js') }}"></script>
    <script src="{{ secure_asset('public/js/searchcontratos.js') }}"></script>

    <script src="{{ secure_asset('public/js/contratos_pasajeros.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>el ward</title>

    <!-- Styles -->
    <link href="{{ secure_asset('public/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>


    <link href="{{ secure_asset('public/css/style.css') }}" rel="stylesheet">
    <script src="{{secure_asset('public/tinymce/js/tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{secure_asset('public/tinymce/js/tinymce/tinymce.min.js')}}"></script>
</head>
<style media="screen">
.loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

<body class="app sidebar-minimized">
  <header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
    <a class="navbar-brand" href="{{ url('/') }}">
    </a>
    <ul class="nav navbar-nav d-md-down-none">
      @guest
        @else
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Ir a la Web </a>
            </li>
            <li class="nav-item">
            </li>
          </ul>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="d-md-down-none">  {{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-header text-center">
                <strong>Cuenta</strong>
              </div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Salir</a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </div>
          </li>
      @endguest
      <li class="nav-item">
      </li>
    </ul>
  </header>
  <div class="app-body">
    <div class="sidebar">
      <nav class="sidebar-nav ">
        <ul class="nav">
          @guest
            @else
              <li class="nav-item">
                <a class="nav-link {{ request()->is('/dashboard') ? 'active' : '' }}
                " href="{{route('dashboard.index')}}"><i class="icon-speedometer"></i> <i class="fa fa-line-chart"></i> Dashboard </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('/category') ? 'active' : '' }}
                " href="{{route('category.index')}}"><i class="icon-speedometer"></i> <i class="fa fa-list"></i> Categorias </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('/posts') ? 'active' : '' }}
                " href="{{url('/posts')}}"><i class="icon-speedometer"></i> <i class="fa fa-plus"></i> Publicaciones </a>
              </li>
              <li class="nav-title">
               Usuarios
             </li>
             <li class="nav-item">
               <a class="nav-link   {{ request()->is('users') ? 'active' : '' }}
                 {{ request()->is('users') ? 'active' : '' }}" href="{{route('users.index')}}" ><i class="icon-speedometer"></i> <i class="fa fa-user"></i> Usuarios </a>
             </li>
             <li class="nav-item">
               <a class="nav-link   {{ request()->is('roles') ? 'active' : '' }}
                 {{ request()->is('roles') ? 'active' : '' }}" href="{{route('roles.index')}}" ><i class="icon-speedometer"></i> <i class="fa fa-check"></i> Roles </a>
             </li>
             <li class="nav-item">
               <a class="nav-link   {{ request()->is('permissions') ? 'active' : '' }}
                 {{ request()->is('permissions') ? 'active' : '' }}" href="{{route('permissions.index')}}" ><i class="icon-speedometer"></i> <i class="fa fa-th-list"></i> Permisos </a>
             </li>
          @endguest
        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>

    </div>

    <!-- Main content -->
    <main class="main">

        @yield('content')

  </div>
  </main>

    <!-- Scripts -->
<script type="text/javascript">
  var base_url = '{{ url('/') }}';
</script>
{!! Notify::render() !!}

</body>
</html>
