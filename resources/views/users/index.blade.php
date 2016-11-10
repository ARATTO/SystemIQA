@extends('template.main')

@section('title', 'Usuarios | Control')

@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        @if (session()->has('flash_notification.message'))
        <div class="alert alert-{{ session('flash_notification.level') }}">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {!! session('flash_notification.message') !!}
        </div>
      @endif

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Usuarios
            <small> panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/users') }}"><i class="active fa fa-dashboard"></i>Usuarios</a></li>
          </ol>
        </section>


        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">
          <!--BUSQUEDA-->


            <div class="form-group">
              <div class="row">
                <div class="navbar-form pull-lefth col-xs-4">
                  <div class="input-group">
                    <a href=" {{url('/users/create')}} " class="form-control btn btn-primary">Registrar nuevo usuario</a>
                  </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
                <div class="navbar-form pull-right">
                  <div class="col-lg-12">
                    <div class="input-group">

                      {{Form::model(Request::all(), ['route' => 'users.index' , 'method' => 'GET']) }}
                        {!! form::text('carnet', null, ['class' => 'form-control', 'placeholder'=> 'Buscar Usuarios']) !!}
                        <button type="submit" class="glyphicon glyphicon-search btn btn-info"></button>
                      {!! Form::close() !!}

                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                </div><!-- /.col-lg-6 -->
              </div><!-- /.row -->
            </div>


          <!--FIN BUSQUEDA-->
          <hr>
          <div class="box box-primary">

          <div class="box-body" style="overflow-x: auto;">
            <table class="table table-striped" >
              <thead>
                <th>Perfil</th>
                <th>Carnet</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Accion</th>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>
                      <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                          <img src="{{ asset('dist/img/systemiqa/fotosPerfil/' . $user->foto)}}" class="user-image" alt="User Image">
                        </li>
                      </ul>
                    </td>
                    <td>{{$user->carnet}} </td>
                    <td>{{$user->nombre}} </td>
                    <td>{{$user->apellido}} </td>
                    <td>{{$user->email}} </td>

                    <td>
                      @foreach($rols as $rol)
                        @if($user->rol_id == $rol->id)
                          <span class="label label-primary"> {{$rol->nombre}} </span>
                        @endif
                      @endforeach
                    </td>


                    <td>
                      <a href=" {{ route('users.edit' , $user->id) }} " class="btn btn-warning">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>
                      <a href=" {{ route('users.destroy' , $user->id) }} " class="btn btn-danger" onclick="return confirm('¿Deseas Eliminar este Usuario?')">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                      </a>
                    </td>

                  </tr>
                @endforeach

              </tbody>
            </table>

            {!! $users->appends(Request::all())->render() !!}



          </section>
        </div>
        </div>
@endsection
