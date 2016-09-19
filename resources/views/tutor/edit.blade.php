@extends('template.main')

@section('title', 'Tutores | Edicion' . $tutor->nombre)

@section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tutor
            <small> Editar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/users') }}"><i class="fa fa-dashboard"></i>Tutor</a></li>
            <li class="active">Editar</li>
          </ol>
        </section>

        <!--     -->

        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">

          <div class="box box-primary">

            <div class="box-body">

              <div class="col-xs-12">
                <div class="panel panel-info">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Formulario Editar</div>

                  <!-- Table -->
                  <table class="table">

                    <div class="col-xs-12">

                    <!--          Formulario            -->

                      {!! Form::open(['route' => ['tutor.update', $tutor], 'method' => 'PUT']) !!}

  <div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', $tutor->nombre, ['class' => 'form-control', 'placeholder' => 'Nombres', 'required']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('name', 'Apellido') !!}
    {!! Form::text('name', $tutor->apellido, ['class' => 'form-control', 'placeholder' => 'Apellidos', 'required']) !!}
  </div>

   <div class="form-group">
    {!! Form::label('name', 'Telefono') !!}
    {!! Form::text('name', $tutor->telefono, ['class' => 'form-control', 'placeholder' => 'Numero de telefono', 'required']) !!}
  </div>

  <div class = "form_group">
    {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
  </div>

  {!! Form::close() !!}


                    <!--          FIN Formulario            -->
                      </div>
                    </table>
                </div>

              </div>

          </div>

@endsection
