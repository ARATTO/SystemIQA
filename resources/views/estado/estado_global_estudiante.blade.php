@extends('template.main')

@section('title', 'Estado Global')

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


  {!! Form::open(['action' => 'EstudianteController@guardarAsesoria']) !!} 

<table class="table table-stripped">
    <thead>
      <th>
        <div>
          {!! Form::label('grupo', 'Seleccione el asesor') !!}
          {!! form::select('asesor', $asesores, null, ['class' => 'form-control select-category', 'placeholder' => 'Seleccione un asesor', 'required']) !!}
        </div>
      </th>
      <th><div></div></th>
      <th>  
        {!! Form::submit('Guardar', ['class'=> 'btn btn-primary' ]) !!}  
      </th>

    </thead>
  </table>

<div class="box-body" style="overflow-x: auto;">
  
<table class="table table-stripped">
  <thead>
    <th>Carnet</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Estado Global</th>

    <th>Asignar Asesor</th>

    <th>Porcentaje</th>
    <th>Progreso de carrera</th>
  </thead>
  <tbody>
    @foreach($estudiantes as $mat)
      <tr>
        <td>{{ $mat->carnet }}</td>
        <td>{{ $mat->nombre }}</td>
        <td>{{ $mat->apellido }}</td>


        @if($mat->CUM >= 7)

                                  <td><div  name="confirmo"  >APROBADO</div></td> 
                                @else
                                  <td><div  name="confirmo"  >P.E.R.A</div></td>
                                @endif

        <td>  <input style="text-align:center;" type="checkbox" name="{{ $mat->id}}" value="{{ $mat->carnet }}">  </td>

        <td>{{ round(($mat->materias_ganadas/46)*100, 2) }}%</td>

        @if(round(($mat->materias_ganadas/46)*100, 2) >= 60)
                                  <td><div class="progress">
                                      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{ round(($mat->materias_ganadas/46)*100, 2) }}%">
                                      <span class="sr-only">round(($mat->materias_ganadas/46)*100, 2) Complete (success)</span>  
                                      </div>
                                    ` </div>
                                  </td> 
                                @else
                                  <td><div class="progress">
                                      <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:{{ round(($mat->materias_ganadas/46)*100, 2) }}%">
                                        <span class="sr-only"> round(($mat->materias_ganadas/46)*100, 2)  Complete</span>
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