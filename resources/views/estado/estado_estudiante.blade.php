@extends('template.main')

@section('title', 'Estados')

@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        @if (session()->has('flash_notification.message'))
        <div class="alert alert-{{ session('flash_notification.level') }}">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {!! session('flash_notification.message') !!}
        </div>
      @endif

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Estados
            <small> panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/estado') }}"><i class="active fa fa-dashboard"></i>Estudiantes</a></li>
          </ol>
        </section>


        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">

<div class="box box-primary">

<div class="box-header">
<h3 class="box-little">Estudiantes encontrados</h3>
</div>
  {!! Form::open(['action' => 'EstudianteController@guardarTutoria']) !!} 

  <table class="table table-stripped">
    <thead>
      <th>
        <div>
          {!! form::label('fechagrupo', 'Fecha de tutoria') !!}<br>
            
              <input type="date" class="form-control" id="fecha_grupo" name="fecha_grupo" data-provide="datepicker" placeholder="año/mes/dia" required="true" data-date-format="yyyy-mm-dd">
            
        </div>
      </th>
      <th>
        <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
              {!! form::label('horagrupo', 'Hora de tutoria') !!}<br>
              <input type="time" class="form-control" value="6:20" name="hora">  
        </div>
      <th>
        <div>
          {!! Form::label('tutor', 'Seleccione el tutor') !!}
          {!! form::select('tutor', $tutores, null, ['class' => 'form-control select-category', 'placeholder' => 'Seleccione un tutor', 'required']) !!}
      </div>
      </th>
      </th>

      <th>  
        {!! Form::submit('Guardar', ['class'=> 'btn btn-primary btn-lg' ]) !!}  
      </th>

    </thead>
  </table>

          <div class="form-group" style="display: none;">
                {!! Form::text('materiaSeleccionada',$materiaSeleccionada,['class'=>'form-control']) !!}
        </div>



<div class="box-body" style="overflow-x: auto;">

  
<table class="table table-stripped">
  <thead>
    <th>Carnet</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Estado Actual</th>
    <th>Tutoria</th>
    <th>Estado de Carrera</th>
    <th>Porcentaje</th>
    <th>Progreso de carrera</th>
  </thead>
  <tbody>
    @foreach($estudiantes as $mat)
      <tr>
        <td>{{ $mat->estudiante->carnet }}</td>
        <td>{{ $mat->estudiante->nombre }}</td>
        <td>{{ $mat->estudiante->apellido }}</td>
        <td>{{ $mat->nota_final }} </td>

        <td>  <input type="checkbox" name="{{ $mat->estudiante->id}}" value="{{ $mat->estudiante->carnet }}">  </td>
        @if(($mat->estudiante->materias_ganadas/46)*100 >= 60)
                                  <td><div  name="confirmo"  >APTO PARA SERVICIO SOCIAL</div></td> 
                                @else
                                  <td><div  name="confirmo"  >NO APTO PARA SERVICIO SOCIAL</div></td>
                                @endif
        <td>{{ round(($mat->estudiante->materias_ganadas/46)*100, 2) }}%</td>

        @if(round(($mat->estudiante->materias_ganadas/46)*100, 2) >= 60)
                                  <td><div class="progress">
                                      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{ round(($mat->estudiante->materias_ganadas/46)*100, 2) }}%">
                                      <span class="sr-only">round(($mat->estudiante->materias_ganadas/46)*100, 2) Complete (success)</span>  
                                      </div>
                                    ` </div>
                                  </td> 
                                @else
                                  <td><div class="progress">
                                      <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:{{ round(($mat->estudiante->materias_ganadas/46)*100, 2) }}%">
                                        <span class="sr-only"> round(($mat->estudiante->materias_ganadas/46)*100, 2)  Complete</span>
                                      </div>
                                    </div>
                                  </td>
                                @endif
      </tr>
    @endforeach
  </tbody>
</table>


          </section>

           


</div>
</div>

 {!! Form::close()!!}

@endsection


@section('js')


  <script>
    $('.datepicker').datepicker({
        startDate: '-3d'
      });
  </script>

  <script type="text/javascript">
    $('.clockpicker').clockpicker();
  </script>
@endsection('js')

