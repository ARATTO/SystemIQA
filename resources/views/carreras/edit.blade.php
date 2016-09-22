@extends('template.main')
 
@section('title', 'Carrera | Editar')

@section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Carrera
            <small> Nueva</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('carreras.index')}}"><i class="fa fa-dashboard"></i>Carrera</a></li>
            <li class="active">Nueva</li>
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
                  <div class="panel-heading">Formulario Editar Carrera</div>
                  </div>

                  <!-- Aqui se mostrara el mensaje -->
                  @include('template.partials.mensaje')
                    <div class="col-xs-12">
                    <!--          Formulario            -->
      <div class="panel-body">

         
          {!! Form::open(['route' => ['carreras.update',$carrera->id],'method'=>'PUT'])!!}
          <div class="form-group">
            {!! Form::label('codigo','Código') !!}
            {!! Form::text('codigo',$carrera->codigo,['class'=>'form-control','placeholder'=>'I10506','pattern'=>'[A-Za-z]{1}[0-9]{5}','title'=>'I10506','required'])!!}
          </div>
          <div class="form-group">
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text('nombre',$carrera->nombre,['class'=>'form-control','placeholder'=>'Química General II','required'])!!}  
          </div>
        <div class="form-group">
            {!! Form::label('descripcion','Nombre') !!}
            {!! Form::textarea('descripcion',$carrera->descripcion,['class'=>'form-control','placeholder'=>'Materia que se fundamenta en los principios... ','required'])!!}  
          </div>
         
        
        <div class="form-group">
          {!! Form::submit('Modificar',['class'=>'btn btn-primary' ]) !!}
        </div>

        {!! Form::close()!!}
      </div>

                    <!--          FIN Formulario            -->
                      </div>

              </div>

          </div>

@endsection