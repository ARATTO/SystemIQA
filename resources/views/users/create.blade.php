@extends('template.main')

@section('title', 'Usuarios | Nuevo')

@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Usuarios
            <small> Nuevo</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/users') }}"><i class="fa fa-dashboard"></i>Usuarios</a></li>
            <li class="active">Nuevo</li>
          </ol>
        </section>


        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">

          <div class="box box-primary">

            <div class="box-body">

              <div class="col-xs-12">
                <div class="panel panel-info">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Formulario Nuevo Usuario</div>

                  <!-- Table -->
                  <table class="table">

                    <div class="col-xs-12">
                        {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
                          <br>
                          <hr>
                          <div class="row">
                            <div class="col-xs-6">
                              <div class="input-group col-xs-12">
                                <div class="form-group">
                                  {!! form::label('carnet','Carnet') !!}
                                  {!! form::text('carnet', null, ['class' => 'form-control', 'placeholder'=> 'Carnet de Usuario', 'required']) !!}
                                </div>
                              </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-xs-6">
                              <div class="input-group col-xs-12">
                                <div class="form-group">
                                    {!! form::label('nombre','Nombres') !!}
                                    {!! form::text('nombre', null, ['class' => 'form-control', 'placeholder'=> 'Nombres', 'required']) !!}
                                </div>
                              </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                            <div class="col-xs-6">
                              <div class="input-group col-xs-12">
                                <div class="form-group">
                                    {!! form::label('apellido','Apellidos') !!}
                                    {!! form::text('apellido', null, ['class' => 'form-control', 'placeholder'=> 'Apellidos', 'required']) !!}
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
                                  {!! form::email('email', null, ['class' => 'form-control', 'placeholder'=> 'ejemplo@gmail.com', 'required']) !!}
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
                                        <option value= {{$rol->id}} > {{$rol->nombre}} </option>
                                    @endforeach
                                  </select>
                                </div>
                              </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                          </div>
                          <br>
                          <hr>
                          <div class="row">
                            <div class="col-xs-6">
                              <div class="input-group col-xs-12">
                                <div class="form-group">
                                  {!! form::label('password','Contraseña') !!}
                                  {!! form::password('password',  ['class' => 'form-control', 'placeholder'=> '*********', 'required']) !!}
                                </div>
                              </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                            <div class="col-xs-6">
                              <div class="input-group col-xs-12">
                                <div class="form-group">
                                  {!! form::label('passwordConf','Confirmar Contraseña') !!}
                                  {!! form::password('passwordConf',  ['class' => 'form-control', 'placeholder'=> '*********', 'required']) !!}
                                </div>
                              </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                          </div><!-- /.row -->
                          <br>

                          <hr>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="input-group col-xs-12">
                                <div class="form-group">
                                  <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                    <div class="btn-group" role="group">
                                      {!! form::submit('REGISTRAR USUARIO', ['class'=> 'btn btn-primary']) !!}
                                    </div>
                                  </div>
                                </div>
                              </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                          </div>
                          <br>

                        {!! form::close() !!}

                    </div>
                  </table>
                </div>

              </div>

          </div>
        </section>



@endsection
