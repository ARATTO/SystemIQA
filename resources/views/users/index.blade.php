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


          <a href=" {{url('/users/create')}} " class="btn btn-info">Registrar nuevo usuario</a><hr>

          <table class="table table-striped" >
            <thead>
              <th>ID</th>
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
                  <td>{{$user->id}} </td>
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
                    <a href=" {{ route('users.destroy' , $user->id) }} " class="btn btn-danger">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                  </td>

                </tr>
              @endforeach

            </tbody>
          </table>

          {!! $users->render() !!}



        </section>

@endsection
