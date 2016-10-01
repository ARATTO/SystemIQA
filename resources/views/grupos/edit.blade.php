@extends('template.main')

@section('title', 'Grupo | Editar')

@section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Grupo
            <small> Editar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{route('grupos.index')}}"><i class="fa fa-dashboard"></i>Grupo</a></li>
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
                  <div class="panel-heading">Formulario Editar Grupo</div>
                  </div>

                  <!-- Aqui se mostrara el mensaje -->
                  @include('template.partials.mensaje')
                    <div class="col-xs-12">
                    <!--          Formulario            -->

         
          {!! Form::open(['route' => ['grupos.update',$grupo],'method'=>'PUT'])!!}
          <div class="form-group">
            {!! Form::label('codigo','Código') !!}
            {!! Form::text('codigo',$grupo->codigo,['class'=>'form-control','placeholder'=>'GT01','pattern'=>'[A-Za-z]{2}[0-9]{2}','title'=>'GT01','required'])!!}
          </div>
         <div class="form-group">
          {!! Form::label('materia_id','Asignatura : ') !!} &nbsp;&nbsp;&nbsp;
            {!! Form::select(
              'materia_id',
              $materias,
              $grupo->materia_id,
          ['class'=>'select-carrera','required']) !!}

        </div>
        <div class="form-group">
          {!! Form::label('tipoGrupo_id','Tipo de grupo: ') !!} &nbsp;&nbsp;&nbsp;
            {!! Form::select(
              'tipoGrupo_id',
              $tipos_grupo,
              $grupo->tipoGrupo_id,
          ['class'=>'select-carrera','required']) !!}

        </div>

          <div class="form-group">
            {!! Form::label('horario','Horario') !!}
            {!! Form::text('horario',$grupo->horario,['class'=>'form-control  time-clase','required'])!!}  
          </div>

           <div class="form-group">
            {!! Form::label('cantidad_estudiante','Cantidad de Estudiantes') !!}
            {!! Form::number('cantidad_estudiante',$grupo->cantidad_estudiante,['class'=>'form-control','min'=>0,'max'=>1000,'required']) !!}
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