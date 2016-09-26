@extends('template.main')

@section('title', 'Asignaturas | Editar')

@section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Asignatura
            <small> Nuevo</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('materias.index')}}"><i class="fa fa-dashboard"></i>Asignatura</a></li>
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
                  <div class="panel-heading">Formulario Editar Asignatura</div>
                  </div>

                  <!-- Aqui se mostrara el mensaje -->
                  @include('template.partials.mensaje')
                    <div class="col-xs-12">
                    <!--          Formulario            -->
      <div class="panel-body">

        {!! Form::open(['route' => ['materias.update',$mat->id],'method'=>'PUT'])!!}
        <div class="form-group">
          {!! Form::label('codigo','Código') !!}
          {!! Form::text('codigo', $mat->codigo,['class'=>'form-control','placeholder'=>'QUR-115','pattern'=>'[A-Za-z]{3}-[0-9]{3}','title'=>'QUR-115','required'])!!}
        </div>
        <div class="form-group">
          {!! Form::label('nombre','Nombre') !!}
          {!! Form::text('nombre',$mat->nombre,['class'=>'form-control','placeholder'=>'Química General II','required'])!!}  
        </div>
        <div class="form-group">
          {!! Form::label('codigo','Carreras Universitaria: ') !!} &nbsp;&nbsp;&nbsp;
          {!! Form::select('ids[]',$carreras,$mat_carreras,['class'=>'form-control select-carrera','multiple','required']) !!}
          </div>
        <div class="form-group">
          {!! Form::label('unidades_valorativas','Unidades Valorativas') !!}
          {!! Form::number('unidades_valorativas',$mat->unidades_valorativas,['class'=>'form-control','min'=>1,'max'=>10,'required']) !!}
        </div>
        

        <div class="form-group">
          {!! Form::label('matricula','Numero de Matricula') !!}
         {!! Form::number('matricula',$mat->numero_retiros,['class'=>'form-control','min'=>0,'max'=>10000,'required']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('numero_retiros','Numero de retiros') !!}
          {!! Form::number('numero_retiros',$mat->numero_retiros,['class'=>'form-control','min'=>0,'max'=>10000,'required']) !!}
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