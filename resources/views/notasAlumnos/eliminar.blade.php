@extends('template.main')

@section('title', 'Crear porcentaje de notas')

@section('content')


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>


{!! Form::open(['action' => 'IngresarNotasController@destroy']) !!}
           @include('flash::message')

<section class="content"  id="contenido_principal">

   <div class="form-group">

      <div id="panel" class="panel panel-primary">
        <div class="panel-heading">
            <div>
              <h3>Ver estudiantes</h3>
            </div>
      
        </div>	

     <div class="panel-body">
        <table class="table table-striped" > 
          <thead>
            <th>Eliminar</th>
            <th>Carnet</th>
            <th>Nombre</th>
          </thead>
          <tbody>
            @foreach($materiaInscrita as $alumno)
            <tr>
              <td><input type="checkbox" name="{{$alumno->id}}" value="{{$alumno->id}}"></td>
              <td>{{$alumno->estudiante->carnet}}</td>
              <td>{{$alumno->estudiante->apellido}}  {{$alumno->estudiante->nombre}}</td>
            </tr>
            
            @endforeach
            
          </tbody>
        </table>


      <div class="form-group">
        <hr>
        {!! form::submit('Eliminar', ['class'=> 'btn-primary']) !!}

      </div>

     </div>

</section>

	</div>

	  {!! Form::close() !!}


@endsection