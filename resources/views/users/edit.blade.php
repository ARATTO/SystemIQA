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


          {!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT']) !!}

            <div class="form-group">
              {!! form::label('carnet','Carnet') !!}
              {!! form::text('carnet', $user->carnet, ['class' => 'form-control', 'placeholder'=> 'Carnet de Usuario', 'required']) !!}
            </div>

            <div class="form-group">
          			{!! form::label('nombre','Nombres') !!}
          			{!! form::text('nombre', $user->nombre, ['class' => 'form-control', 'placeholder'=> 'Nombres', 'required']) !!}
          	</div>

            <div class="form-group">
          			{!! form::label('apellido','Apellidos') !!}
          			{!! form::text('apellido', $user->apellido, ['class' => 'form-control', 'placeholder'=> 'Apellidos', 'required']) !!}
          	</div>

        		<div class="form-group">
        			{!! form::label('email','Correo Electronico') !!}
        			{!! form::email('email', $user->email, ['class' => 'form-control', 'placeholder'=> 'ejemplo@gmail.com', 'required']) !!}
        		</div>

        		<div class="form-group">
        			{!! form::label('rol_id', 'Rol de Usuario') !!}
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

        		<div class="form-group">

        			{!! form::submit('Registrar', ['class'=> 'btn-primary']) !!}

        		</div>

        	{!! form::close() !!}


        </section>



@endsection
