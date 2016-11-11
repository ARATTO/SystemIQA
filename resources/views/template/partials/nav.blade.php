
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href=" {{ url('/home') }} " class="logo">
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
                            <img src="{{ asset('dist/img/systemiqa/fotosPerfil/' . Auth::user()->foto)}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->nombre }}</span>


                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('dist/img/systemiqa/fotosPerfil/' . Auth::user()->foto)}}" class="img-circle" alt="User Image">
                                <p>

                                    {{ Auth::user()->nombre }}{{ ' ' . Auth::user()->apellido }}
                                    <small>Miembro desde {{ Auth::user()->created_at }} </small>

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

                                    <a href="{{ url('/logout') }}" class="btn btn-danger btn-flat">SALIR</a>

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
                    <img src="{{ asset('dist/img/systemiqa/fotosPerfil/' . Auth::user()->foto)}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->nombre }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
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

                <li class="header">MENÚ</li>

                
                <!--MOTTO-->
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
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
                        <i class="fa fa-fw fa-user-plus"></i> <span>Datos de Estudiantes</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">

                        <li class="active"><a href="{{ url('/create') }} "><i class="fa fa-circle-o"></i>Cargar Estudiantes. </a></li>

                    </ul>
                </li>
                <!-- FIN  LOBOS -->

                <!--  Panel de Grupos  -Elias   -->
                <li class="active treeview" id="lista_elias">
                    <a href="#">
                        <i class="glyphicon glyphicon-list-alt"></i>
                        <span>Grupos</span> 
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="{{route('grupos.index')}}" >
                                <i class="fa fa-circle-o"></i>Listado Grupos</a>
                        </li>
                        <li class="active"><a href="{{route('grupos.create')}}"  >
                                <i class="fa fa-circle-o"></i>Agregar Grupo</a>
                        </li>
                    </ul>
                </li> 
                <!--  Fin Panel de Grupos      -->

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


                <!--  Panel de Carreras  -Elias   -->
                <li class="active treeview" id="lista_elias">
                    <a href="#">
                        <i class="glyphicon glyphicon-education"></i>
                        <span>Carreras Universitarias</span> 
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="{{route('carreras.index')}}" >
                                <i class="fa fa-circle-o"></i>Listado Carreras</a>
                        </li>
                        <li class="active"><a href="{{route('carreras.create')}}"  >
                                <i class="fa fa-circle-o"></i>Agregar Carrera</a>
                        </li>
                    </ul>
                </li> 
                <!--  Fin Panel de Carreras      -->

                <!--Alam-->

                <li class="active treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-book"></i> <span>Tutores</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href=" {{ url('/tutor') }} "><i class="fa fa-circle-o"></i>Ver</a></li>
                        <li><a href=" {{ url('tutor/create') }} "><i class="fa fa-circle-o"></i>Agregar</a></li>
                    </ul>
                </li>
                <!--FIN ALAM-->


                <!--RODRIGO-->
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Porcentaje de las notas</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href=" {{ url('/elejirCarrera') }} "><i class="fa fa-circle-o"></i>Agregar porcentaje</a></li>
                        <li><a href=" {{ url('/verPorcentajes') }} "><i class="fa fa-circle-o"></i>ver Porcentajes</a></li>
                    </ul>
                </li>


                <!--RODRIGO-->
                <li class="active treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-list-alt"></i> <span>Ingresar notas</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href=" {{ url('/ingresarNotas/seleccionar') }} "><i class="fa fa-circle-o"></i>Agregar notas</a></li>
                    </ul>
                </li>

                <!--RODRIGO-->
                <li class="active treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-list-alt"></i> <span>Ciclo</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href=" {{ url('/crearCiclo') }} "><i class="fa fa-circle-o"></i>Agregar ciclo</a></li>
                        <li><a href=" {{ url('/verCiclos') }} "><i class="fa fa-circle-o"></i>Ver ciclos</a></li>
                    </ul>
                </li>


                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-fw fa-user-plus"></i> <span>Estado de Alumnos</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href=" {{ url('/estado/create') }} "><i class="fa fa-circle-o"></i>Estado Actual de Alumnos</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a href=" {{ url('/estado/create2') }} "><i class="fa fa-circle-o"></i>Estado Global de Alumnos</a></li>
                    </ul>
                </li>
                




            </ul>
        </section>
        <!-- /.sidebar -->


    </aside>

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>

    </aside>

