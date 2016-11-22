@extends('template.main')

@section('title', 'Asignaturas | Nuevo')
 
@section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Carrera
            <small> Nuevo</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{route('carreras.index')}}"><i class="fa fa-dashboard"></i>Carrera</a></li>
            <li class="active">Nuevo</li>
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
                  <div class="panel-heading">Formulario Nueva Asignatura</div>
                  </div>

                  <!-- Aqui se mostrara el mensaje -->
                  @include('template.partials.mensaje')
                    <div class="col-xs-12">
                    <!--          Formulario            -->

      
      <div class="panel-body">
          {!! Form::open(['route' => 'carreras.store','method'=>'POST'])!!}
          <div class="form-group">
            {!! Form::label('codigo','Código') !!}
            {!! Form::text('codigo',null,['class'=>'form-control','placeholder'=>'I10506','pattern'=>'[A-Za-z]{1}[0-9]{5}','title'=>'I10506','required'])!!}
          </div>
          <div class="form-group">
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingeniería Química','required'])!!}  
          </div>
        <div class="form-group">
            {!! Form::label('descripcion','Nombre') !!}
            {!! Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'La Ingeniería Química es la rama de la Ingeniería que proporciona las bases científico-tecnológicas para el desarrollo y aplicación de los procesos de producción de bienes y servicios donde intervienen cambios físicos, químicos y bioquímicos, refiriendo su trabajo principalmente al diseño, selección y operación de equipo y plantas de procesos. La Carrera se orienta a la formación de profesionales capaces de manejar la producción de bienes y servicios en forma rentable, en condiciones de óptima calidad y compatible con el Medio Ambiente; para lo que se infunden conocimientos para la aplicación de tecnologías apropiadas con énfasis en la prevención de contaminación, bajo la filosofía de las Tecnologías «Más/Limpias» de producción; y para la reutilización, el reciclaje, el tratamiento y la disposición final adecuada de residuos y desechos industriales y municipales, según convenga. Así como, conocimientos en el control de calidad de procesos y productos y su análisis económico. Para lo que se requiere una sólida formación en las ciencias básicas Química, Física y Matemática y en las técnicas propias de la Ingeniería Química.','required'])!!}  
          </div>
         
          <div class="form-group">
            {!! Form::submit('Registrar',['class'=>'btn btn-primary' ]) !!}
          </div>

          {!! Form::close()!!}
      </div>

                    <!--          FIN Formulario            -->
                      </div>

              </div>

          </div>

@endsection