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

<div class="box-body" style="overflow-x: auto;">
  
<table class="table table-stripped">
  <thead>
    <th>Carnet</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Estado Actual</th>
    <th>Estado Global</th>
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
        <td>{{ $mat->nota_final}}</td>

        @if($mat->estudiante->CUM >= 6)
                                  <td><div  name="confirmo"  >APROBADO</div></td> 
                                @else
                                  <td><div  name="confirmo"  >P.E.R.A</div></td>
                                @endif
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
@endsection