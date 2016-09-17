@extends('template.main')

@section('title', 'Usuarios | Crear')

@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Usuarios
            <small> Crear</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Usuarios</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i>Crear</a></li>
            <li class="active">Crear</li>
          </ol>
        </section>


        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">


          {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
        		<div class="form-group">
        			{!! form::label('name','Nombre') !!}
        			{!! form::text('name', null, ['class' => 'form-control', 'placeholder'=> 'Nombre completo', 'required']) !!}
        		</div>

        		<div class="form-group">
        			{!! form::label('email','Correo Electronico') !!}
        			{!! form::email('email', null, ['class' => 'form-control', 'placeholder'=> 'ejemplo@outlook.com', 'required']) !!}
        		</div>

        		<div class="form-group">
        			{!! form::label('password','Contraseña') !!}
        			{!! form::password('password',  ['class' => 'form-control', 'placeholder'=> '-----------', 'required']) !!}
        		</div>

        		<div class="form-group">
        			{!! form::label('type', 'tipo') !!}
        			{!! form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], null, ['class' => 'form-control']) !!}

        		</div>

        		<div class="form-group">

        			{!! form::submit('Registrar', ['class'=> 'btn-primary']) !!}

        		</div>

        	{!! form::close() !!}


        </section>

@endsection
