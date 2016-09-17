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
              <th>Nombre</th>
              <th>Correo</th>
              <th>Tipo</th>
              <th>Accion</th>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td>{{$user->id}} </td>
                  <td>{{$user->name}} </td>
                  <td>{{$user->email}} </td>
                  <td>
                    @if($user->type == "admin")
                      <span class="label label-danger">{{$user->type}} </span>
                    @else
                      <span class="label label-primary">{{$user->type}} </span>
                    @endif

                  </td>
                  <td> <a href="" class="btn btn-danger"></a>  <a href="" class="btn btn-warning"></a>  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          {!! $users->render() !!}



        </section>

@endsection
