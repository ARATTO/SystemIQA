<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>QA</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>System</b>IQA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less
            
           Auth::user()->created_at

          User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">

              <span class="hidden-xs">{{ Auth::user()->nombre }}</span>

            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                <p>
                 Usuario SystemIQA

                  <small>Miembro desde {{Auth::user()->created_at}} </small>

                </p>
              </li>
              <!-- Menu Body -->
              <!--
              <li class="user-body">
                <div class="col-xs-4 text-center">
                  <a href="#">Estadisticas</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Perfil</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Recientes</a>
                </div>
              </li>
            -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="logout" class="btn btn-danger btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Usuario:SystemIQA</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENÃš</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Panel de control</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">

        

            <li><a href=" {{ url('/home') }} "><i class="fa fa-circle-o"></i>Algo principal </a></li>
          </ul>
        </li>



        <!--MOTTO-->
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>USUARIOS</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ url('/users') }} "><i class="fa fa-circle-o"></i>Ver</a></li>
            <li><a href=" {{ url('users/create') }} "><i class="fa fa-circle-o"></i>Agregar</a></li>
          </ul>
        </li>


        <!-- FIN MOTTO -->

        <!--Lobos-->
        <li class="treeview">
              <a href="#">
                <i class="fa fa-fw fa-user-plus"></i> <span>Datos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{ url('/cargar_usuarios') }} "><i class="fa fa-circle-o"></i>Cargar Datos Us. </a></li>
                
              </ul>
            </li>
            <!-- FIN  LOBOS -->


         <!--  Panel de Materias  -Elias   -->
        <li class="active treeview" id="lista_elias">
          <a href="#">
            <i class="glyphicon glyphicon-book"></i>
            <span>Asignaturas</span> 
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('materias.index')}}" >
                <i class="fa fa-circle-o"></i>Listado Asignaturas</a>
            </li>
            <li class="active"><a href="{{route('materias.create')}}"  >
                <i class="fa fa-circle-o"></i>Agregar Asignatura</a>
            </li>
          </ul>
        </li> 
        <!--  Fin Panel de Materias      -->

        <!--Alam-->
            
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>TUTORES</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ url('/tutor') }} "><i class="fa fa-circle-o"></i>Ver</a></li>
            <li><a href=" {{ url('tutor/create') }} "><i class="fa fa-circle-o"></i>Agregar</a></li>
          </ul>
        </li>
<!--FIN ALAM-->


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>