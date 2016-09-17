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
            <li><a href="#"><i class="fa fa-dashboard"></i>Usuarios</a></li>
            <li class="active">Nuevo</li>
          </ol>
        </section>


        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">


          {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

            <div class="form-group">
              {!! form::label('carnet','Carnet') !!}
              {!! form::text('carnet', null, ['class' => 'form-control', 'placeholder'=> 'Carnet de Usuario', 'required']) !!}
            </div>

            <div class="form-group">
          			{!! form::label('nombre','Nombres') !!}
          			{!! form::text('nombre', null, ['class' => 'form-control', 'placeholder'=> 'Nombres', 'required']) !!}
          	</div>

            <div class="form-group">
          			{!! form::label('apellido','Apellidos') !!}
          			{!! form::text('apellido', null, ['class' => 'form-control', 'placeholder'=> 'Apellidos', 'required']) !!}
          	</div>

        		<div class="form-group">
        			{!! form::label('email','Correo Electronico') !!}
        			{!! form::email('email', null, ['class' => 'form-control', 'placeholder'=> 'ejemplo@gmail.com', 'required']) !!}
        		</div>

        		<div class="form-group">
        			{!! form::label('password','Contraseña') !!}
        			{!! form::password('password',  ['class' => 'form-control', 'placeholder'=> '*********', 'required']) !!}
        		</div>

            <div class="form-group">
        			{!! form::label('passwordConf','Confirmar Contraseña') !!}
        			{!! form::password('passwordConf',  ['class' => 'form-control', 'placeholder'=> '*********', 'required']) !!}
        		</div>

        		<div class="form-group">
        			{!! form::label('type', 'tipo') !!}
              <select name="rol_id" id="rol_id" class="form-control selectpicker">
                @foreach($rols as $rol)
                    <option> {{$rol->id}} </option>
                @endforeach
              </select>

        		</div>

        		<div class="form-group">

        			{!! form::submit('Registrar', ['class'=> 'btn-primary']) !!}

        		</div>

        	{!! form::close() !!}


        </section>

@endsection
