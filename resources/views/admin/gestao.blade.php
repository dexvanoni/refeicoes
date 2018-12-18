@extends('layouts.sidebar')

@section('title')
Eduardo Refeições - Dashboard
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('style')
<style type="text/css">
@keyframes swing {
  0% {
    transform: rotate(0deg);
  }
  10% {
    transform: rotate(10deg);
  }
  30% {
    transform: rotate(0deg);
  }
  40% {
    transform: rotate(-10deg);
  }
  50% {
    transform: rotate(0deg);
  }
  60% {
    transform: rotate(5deg);
  }
  70% {
    transform: rotate(0deg);
  }
  80% {
    transform: rotate(-5deg);
  }
  100% {
    transform: rotate(0deg);
  }
}

@keyframes sonar {
  0% {
    transform: scale(0.9);
    opacity: 1;
  }
  100% {
    transform: scale(2);
    opacity: 0;
  }
}
body {
  font-size: 0.9rem;
}
.page-wrapper .sidebar-wrapper,
.sidebar-wrapper .sidebar-brand > a,
.sidebar-wrapper .sidebar-dropdown > a:after,
.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before,
.sidebar-wrapper ul li a i,
.page-wrapper .page-content,
.sidebar-wrapper .sidebar-search input.search-menu,
.sidebar-wrapper .sidebar-search .input-group-text,
.sidebar-wrapper .sidebar-menu ul li a,
#show-sidebar,
#close-sidebar {
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}

/*----------------page-wrapper----------------*/

.page-wrapper {
  height: 100vh;
}

.page-wrapper .theme {
  width: 40px;
  height: 40px;
  display: inline-block;
  border-radius: 4px;
  margin: 2px;
}

.page-wrapper .theme.chiller-theme {
  background: #1d1d1d;
}

/*----------------toggeled sidebar----------------*/

.page-wrapper.toggled .sidebar-wrapper {
  left: 0px;
}

@media screen and (min-width: 768px) {
  .page-wrapper.toggled .page-content {
    padding-left: 300px;
  }
}
/*----------------show sidebar button----------------*/
#show-sidebar {
  position: fixed;
  left: 0;
  top: 10px;
  border-radius: 0 4px 4px 0px;
  width: 35px;
  transition-delay: 0.3s;
}
.page-wrapper.toggled #show-sidebar {
  left: -40px;
}
/*----------------sidebar-wrapper----------------*/

.sidebar-wrapper {
  width: 260px;
  height: 100%;
  max-height: 100%;
  position: fixed;
  top: 0;
  left: -300px;
  z-index: 999;
}

.sidebar-wrapper ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.sidebar-wrapper a {
  text-decoration: none;
}

/*----------------sidebar-content----------------*/

.sidebar-content {
  max-height: calc(100% - 30px);
  height: calc(100% - 30px);
  overflow-y: auto;
  position: relative;
}

.sidebar-content.desktop {
  overflow-y: hidden;
}

/*--------------------sidebar-brand----------------------*/

.sidebar-wrapper .sidebar-brand {
  padding: 10px 20px;
  display: flex;
  align-items: center;
}

.sidebar-wrapper .sidebar-brand > a {
  text-transform: uppercase;
  font-weight: bold;
  flex-grow: 1;
}

.sidebar-wrapper .sidebar-brand #close-sidebar {
  cursor: pointer;
  font-size: 20px;
}
/*--------------------sidebar-header----------------------*/

.sidebar-wrapper .sidebar-header {
  padding: 20px;
  overflow: hidden;
}

.sidebar-wrapper .sidebar-header .user-pic {
  float: left;
  width: 60px;
  padding: 2px;
  border-radius: 12px;
  margin-right: 15px;
  overflow: hidden;
}

.sidebar-wrapper .sidebar-header .user-pic img {
  object-fit: cover;
  height: 100%;
  width: 100%;
}

.sidebar-wrapper .sidebar-header .user-info {
  float: left;
}

.sidebar-wrapper .sidebar-header .user-info > span {
  display: block;
}

.sidebar-wrapper .sidebar-header .user-info .user-role {
  font-size: 12px;
}

.sidebar-wrapper .sidebar-header .user-info .user-status {
  font-size: 11px;
  margin-top: 4px;
}

.sidebar-wrapper .sidebar-header .user-info .user-status i {
  font-size: 8px;
  margin-right: 4px;
  color: #5cb85c;
}

/*-----------------------sidebar-search------------------------*/

.sidebar-wrapper .sidebar-search > div {
  padding: 10px 20px;
}

/*----------------------sidebar-menu-------------------------*/

.sidebar-wrapper .sidebar-menu {
  padding-bottom: 10px;
}

.sidebar-wrapper .sidebar-menu .header-menu span {
  font-weight: bold;
  font-size: 14px;
  padding: 15px 20px 5px 20px;
  display: inline-block;
}

.sidebar-wrapper .sidebar-menu ul li a {
  display: inline-block;
  width: 100%;
  text-decoration: none;
  position: relative;
  padding: 8px 30px 8px 20px;
}

.sidebar-wrapper .sidebar-menu ul li a i {
  margin-right: 10px;
  font-size: 12px;
  width: 30px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  border-radius: 4px;
}

.sidebar-wrapper .sidebar-menu ul li a:hover > i::before {
  display: inline-block;
  animation: swing ease-in-out 0.5s 1 alternate;
}

.sidebar-wrapper .sidebar-menu .sidebar-dropdown > a:after {
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  content: "\f105";
  font-style: normal;
  display: inline-block;
  font-style: normal;
  font-variant: normal;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  background: 0 0;
  position: absolute;
  right: 15px;
  top: 14px;
}

.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul {
  padding: 5px 0;
}

.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li {
  padding-left: 25px;
  font-size: 13px;
}

.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before {
  content: "\f111";
  font-family: "Font Awesome 5 Free";
  font-weight: 400;
  font-style: normal;
  display: inline-block;
  text-align: center;
  text-decoration: none;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  margin-right: 10px;
  font-size: 8px;
}

.sidebar-wrapper .sidebar-menu ul li a span.label,
.sidebar-wrapper .sidebar-menu ul li a span.badge {
  float: right;
  margin-top: 8px;
  margin-left: 5px;
}

.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .badge,
.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .label {
  float: right;
  margin-top: 0px;
}

.sidebar-wrapper .sidebar-menu .sidebar-submenu {
  display: none;
}

.sidebar-wrapper .sidebar-menu .sidebar-dropdown.active > a:after {
  transform: rotate(90deg);
  right: 17px;
}

/*--------------------------side-footer------------------------------*/

.sidebar-footer {
  position: absolute;
  width: 100%;
  bottom: 0;
  display: flex;
}

.sidebar-footer > a {
  flex-grow: 1;
  text-align: center;
  height: 30px;
  line-height: 30px;
  position: relative;
}

.sidebar-footer > a .notification {
  position: absolute;
  top: 0;
}

.badge-sonar {
  display: inline-block;
  background: #980303;
  border-radius: 50%;
  height: 8px;
  width: 8px;
  position: absolute;
  top: 0;
}

.badge-sonar:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  border: 2px solid #980303;
  opacity: 0;
  border-radius: 50%;
  width: 100%;
  height: 100%;
  animation: sonar 1.5s infinite;
}

/*--------------------------page-content-----------------------------*/

.page-wrapper .page-content {
  display: inline-block;
  width: 100%;
  padding-left: 0px;
  padding-top: 20px;
}

.page-wrapper .page-content > div {
  padding: 20px 40px;
}

.page-wrapper .page-content {
  overflow-x: hidden;
}

/*------scroll bar---------------------*/

::-webkit-scrollbar {
  width: 7px;
  height: 7px;
}
::-webkit-scrollbar-button {
  width: 0px;
  height: 0px;
}
::-webkit-scrollbar-thumb {
  background: #636269;
  border: 0px none #ffffff;
  border-radius: 50px;
}
::-webkit-scrollbar-thumb:hover {
  background: #636269;
}
::-webkit-scrollbar-thumb:active {
  background: #636269;
}
::-webkit-scrollbar-track {
  background: #333238;
  border: 0px none #ffffff;
  border-radius: 50px;
}
::-webkit-scrollbar-track:hover {
  background: #333238;
}
::-webkit-scrollbar-track:active {
  background: #333238;
}
::-webkit-scrollbar-corner {
  background: transparent;
}


/*-----------------------------chiller-theme-------------------------------------------------*/

.chiller-theme .sidebar-wrapper {
  background: #1d1d1d;
}

.chiller-theme .sidebar-wrapper .sidebar-header,
.chiller-theme .sidebar-wrapper .sidebar-search,
.chiller-theme .sidebar-wrapper .sidebar-menu {
  border-top: 1px solid #2b2b2b;
}

.chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
.chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
  border-color: #2b2b2b;
  box-shadow: none;
}

.chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-role,
.chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-status,
.chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
.chiller-theme .sidebar-wrapper .sidebar-search .input-group-text,
.chiller-theme .sidebar-wrapper .sidebar-brand>a,
.chiller-theme .sidebar-wrapper .sidebar-menu ul li a,
.chiller-theme .sidebar-footer>a {
  color: #bdbdbd;
}

.chiller-theme .sidebar-wrapper .sidebar-menu ul li:hover>a,
.chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active>a,
.chiller-theme .sidebar-wrapper .sidebar-header .user-info,
.chiller-theme .sidebar-wrapper .sidebar-brand>a:hover,
.chiller-theme .sidebar-footer>a:hover i {
  color: #ffffff;
}

.page-wrapper.chiller-theme.toggled #close-sidebar {
  color: #bdbdbd;
}

.page-wrapper.chiller-theme.toggled #close-sidebar:hover {
  color: #ffffff;
}

.chiller-theme .sidebar-wrapper ul li:hover a i,
.chiller-theme .sidebar-wrapper .sidebar-dropdown .sidebar-submenu li a:hover:before,
.chiller-theme .sidebar-wrapper .sidebar-search input.search-menu:focus+span,
.chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active a i {
  color: #ffffff;
}

.chiller-theme .sidebar-wrapper .sidebar-menu ul li a i,
.chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown div,
.chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
.chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
  background: #2b2b2b;
}

.chiller-theme .sidebar-wrapper .sidebar-menu .header-menu span {
  color: #6c7b88;
}

.chiller-theme .sidebar-footer {
  background: #2b2b2b;
  box-shadow: 0px -1px 5px #131212;
  border-top: 1px solid #3a3a3a;
}

.chiller-theme .sidebar-footer>a:first-child {
  border-left: none;
}

.chiller-theme .sidebar-footer>a:last-child {
  border-right: none;
}

.chiller-theme .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.chiller-theme .mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.chiller-theme .mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar {
  background: #636363;
}

.chiller-theme .mCSB_scrollTools .mCSB_draggerRail {
  background-color: transparent;
}
</style>
@endsection

@section('content')
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">Edu Refeições</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="/imagens/edu.jpg" alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">{{ Auth::user()->name }}
          </span>
          <span class="user-role">Administrador</span>
          <span class="user-status">
            @if (!$sock = @fsockopen('www.google.com.br', 80, $num, $error, 5))
            <i class="fa fa-circle" style="color: red"></i>
              <span>Offline</span>
            @else
               <i class="fa fa-circle"></i>
              <span>Online</span>
            @endif
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
                <!--<div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                  </div>-->
                  <!-- sidebar-search  -->
                  <div class="sidebar-menu">
                    <ul>
                      <li class="header-menu">
                        <span>Administração</span>
                      </li>
                      <li class="sidebar-dropdown">
                        <a href="{{ route('gestao') }}">
                          <i class="fa fa-tachometer-alt"></i>
                          <span>Dashboard</span>
                          <!--<span class="badge badge-pill badge-danger">New</span>-->
                        </a>
                            <!--<div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Dashboard 1
                                            <span class="badge badge-pill badge-success">Pro</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Dashboard 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Dashboard 3</a>
                                    </li>
                                </ul>
                              </div>-->
                            </li>
                            <li class="sidebar-dropdown">
                              <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Pedidos</span>
                                <!--<span class="badge badge-pill badge-primary">3</span>-->
                              </a>
                              <div class="sidebar-submenu">
                                <ul>
                                  <li>
                                    <a href="{{ route('pedidos.index') }}">Lista de pedidos</a>
                                  </li>
                                  <li>
                                    <a href="{{ route('pedidos.create') }}">Novo pedido</a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="sidebar-dropdown">
                              <a href="#">
                                <i class="fas fa-shopping-basket"></i>
                                <span>Produtos</span>
                              </a>
                              <div class="sidebar-submenu">
                                <ul>
                                  <li>
                                    <a href="{{ route('produtos.index') }}">Lista de produtos</a>
                                  </li>
                                  <li>
                                    <a href="{{ route('produtos.create') }}">Novo produto</a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="sidebar-dropdown">
                              <a href="#">
                                <i class="fas fa-users"></i>
                                <span>Clientes</span>
                              </a>
                              <div class="sidebar-submenu">
                                <ul>
                                  <li>
                                    <a href="{{ route('clientes.index') }}">Lista de clientes</a>
                                  </li>
                                  <li>
                                    <a href="{{ route('clientes.create') }}">Novo cliente</a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="sidebar-dropdown">
                              <a href="#">
                                <i class="fa fa-globe"></i>
                                <span>Maps</span>
                              </a>
                              <div class="sidebar-submenu">
                                <ul>
                                  <li>
                                    <a href="https://www.google.com.br/maps">Google maps</a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="sidebar-dropdown">
                              <a href="#">
                                <i class="fas fa-bezier-curve"></i>
                                <span>Relatórios</span>
                              </a>
                              <div class="sidebar-submenu">
                                <ul>
                                  <li>
                                    <a href="{{ route('relatorios.index') }}">Pedidos</a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                          </ul>

                        </div>
                        <!-- sidebar-menu  -->
                      </div>
                      <!-- sidebar-content  -->
                      <div class="sidebar-footer">
                <a href="http://www.fb.com/denis.vanoni" target="_blank">
                    <!--<i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>-->
                    WEBDev | Denis Vanoni
                  </a>
                <!--<a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">7</span>
                  </a>-->
                <!--<a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="badge-sonar"></span>
                  </a>-->
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout').submit();">
                  <i class="fa fa-power-off"></i>
                  <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </a>
              </div>
            </nav>
            <!-- sidebar-wrapper  -->
            <main class="page-content">
              <div class="container-fluid" style="padding-left: 0px;
              @if (Route::getCurrentRoute()->getName() == 'gestao')
                width: 70%; height: 70%
              @endif
              ">
                <!--Todas as páginas aqui-->
                @if (Route::getCurrentRoute()->getName() == 'gestao')
                
                <div class="row justify-content-center align-items-center">
                  <h1 class="justify-content-center align-items-center">Sistema de Gestão de Restaurante</h1>
                  <img class="justify-content-center align-items-center" src="/imagens/restaurante.png">
                  <h5 class="justify-content-center align-items-center">Desenvolvido por WEBDev - Sistemas | Denis Vanoni - (67)99122-4547</h5>
                </div>
                  
                @else
                  @yield('pagina')
                @endif
              </div>
            </main>
            <!-- page-content" -->
          </div>
          <!-- page-wrapper -->

          @endsection

          @section('scripts')
          <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
          <script type="text/javascript">
            jQuery(function ($) {

              $(".sidebar-dropdown > a").click(function() {
                $(".sidebar-submenu").slideUp(200);
                if (
                  $(this)
                  .parent()
                  .hasClass("active")
                  ) {
                  $(".sidebar-dropdown").removeClass("active");
                $(this)
                .parent()
                .removeClass("active");
              } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                .next(".sidebar-submenu")
                .slideDown(200);
                $(this)
                .parent()
                .addClass("active");
              }
            });

              $("#close-sidebar").click(function() {
                $(".page-wrapper").removeClass("toggled");
              });
              $("#show-sidebar").click(function() {
                $(".page-wrapper").addClass("toggled");
              });




            });
          </script>
          @endsection
