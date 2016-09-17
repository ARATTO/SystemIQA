@extends('template.main')

@section('title', 'Usuarios | Control')

@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Usuarios
            <small> panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Usuarios</a></li>
            <li class="active">Ver</li>
          </ol>
        </section>


        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">


          <a href="" class="btn btn-info">Registrar nuevo usuario</a><hr>

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
                  <td>{{$user->name}} </td>
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
                    <a href="" class="btn btn-warning">
                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    <a href="" class="btn btn-danger">
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
