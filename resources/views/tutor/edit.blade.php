@extends('template.main')

@section('title', 'Tutores | Edicion' . $tutor->nombre)

@section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tutor
            <small> Editar {{$tutor->nombre . ' ' . $tutor->apellido}}</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('tutor') }}"><i class="fa fa-dashboard"></i>Tutor</a></li>
            <li class="active">Editar {{$tutor->nombre . ' ' . $tutor->apellido}}</li>
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
                  <div class="panel-heading">Formulario Editar {{$tutor->nombre . ' ' . $tutor->apellido}}</div>

                  <!-- Table -->
                  <table class="table">

                    <div class="col-xs-12">

                    <!--          Formulario            -->

                      {!! Form::open(['route' => ['tutor.update', $tutor], 'method' => 'PUT']) !!}

  <div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', $tutor->nombre, ['class' => 'form-control', 'placeholder' => 'Nombres', 'required']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('apellido', 'Apellido') !!}
    {!! Form::text('apellido', $tutor->apellido, ['class' => 'form-control', 'placeholder' => 'Apellidos', 'required']) !!}
  </div>

   <div class="form-group">
    {!! Form::label('telefono', 'Telefono') !!}
    {!! Form::text('telefono', $tutor->telefono, ['class' => 'form-control', 'placeholder' => 'Numero de telefono', 'required']) !!}
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
