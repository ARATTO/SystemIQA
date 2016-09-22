@extends('template.main')

@section('title', 'Usuarios | Editar ' . $user->nombre)

@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Usuarios
            <small> Editar {{$user->nombre}}</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/users') }}"><i class="fa fa-dashboard"></i>Usuarios</a></li>
            <li class="active">Editar {{$user->nombre}}</li>
          </ol>
        </section>


        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">

          <div class="box box-primary">

            <div class="box-body">

              <div class="col-xs-12">
                <div class="panel panel-success">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Formulario Editar {{$user->nombre}} </div>

                  <!-- Table -->
                  <table class="table">

                    <div class="col-xs-12">
                        {!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT', 'files' => true]) !!}
                        <br>
                        <hr>
                        <div class="row">
                          <div class="col-xs-6">
                            <div class="input-group col-xs-12">
                              <div class="form-group">
                                {!! form::label('carnet','Carnet') !!}
                                {!! form::text('carnet', $user->carnet, ['class' => 'form-control', 'placeholder'=> 'Carnet de Usuario', 'required']) !!}
                              </div>
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->
                          <div class="col-xs-6">
                            <div class="input-group col-xs-12">
                              <div class="form-group">
                                  {!! form::label('foto','Foto de Perfil') !!}
                                  <input class="form-control" name="foto" type="file" id="foto" value="{{$user->foto}}">
                              </div>
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                        <br>
                        <div class="row">
                          <div class="col-xs-6">
                            <div class="input-group col-xs-12">
                              <div class="form-group">
                            			{!! form::label('nombre','Nombres') !!}
                            			{!! form::text('nombre', $user->nombre, ['class' => 'form-control', 'placeholder'=> 'Nombres', 'required']) !!}
                            	</div>
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->
                          <div class="col-xs-6">
                            <div class="input-group col-xs-12">
                              <div class="form-group">
                            			{!! form::label('apellido','Apellidos') !!}
                            			{!! form::text('apellido', $user->apellido, ['class' => 'form-control', 'placeholder'=> 'Apellidos', 'required']) !!}
                            	</div>
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                        <br>
                        <hr>
                        <div class="row">
                          <div class="col-xs-6">
                            <div class="input-group col-xs-12">
                              <div class="form-group">
                          			{!! form::label('email','Correo Electronico') !!}
                          			{!! form::email('email', $user->email, ['class' => 'form-control', 'placeholder'=> 'ejemplo@gmail.com', 'required']) !!}
                          		</div>
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-xs-6">
                            <div class="input-group col-xs-12">
                              <div class="form-group">
                                {!! form::label('rol_id', 'Tipo de Usuario') !!}
                                <select name="rol_id" id="rol_id" class="form-control selectpicker">
                                  @foreach($rols as $rol)
                                      @if($rol->id == $user->rol_id)
                                        <option selected value= {{$rol->id}} > {{$rol->nombre}} </option>
                                      @else
                                        <option value= {{$rol->id}} > {{$rol->nombre}} </option>
                                      @endif
                                  @endforeach
                                </select>
                              </div>
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                          <div class="col-xs-12">
                            <div class="input-group col-xs-12">
                              <div class="form-group">
                                <div class="btn-group btn-group-justified" role="group" aria-label="algo">
                                  <div class="btn-group" role="group">
                                    {!! form::submit('GUARDAR CAMBIOS', ['class'=> 'btn btn-success']) !!}
                                  </div>
                                </div>
                          		</div>
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->
                        </div>
                        <br>

                      	{!! form::close() !!}

            </section>

@endsection
