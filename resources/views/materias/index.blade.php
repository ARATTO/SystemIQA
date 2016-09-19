@extends('template.main')

@section('title', 'Asignaturas | Nuevo')

@section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Asignatura
            <small> Listado</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('materias.index')}}"><i class="fa fa-dashboard"></i>Asignatura</a></li>
            <li class="active">Lista</li>
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

        <div >
        	{!! Form::label('codigo','Carrera Universitaria: ') !!} &nbsp;&nbsp;&nbsp;
            {!! Form::select(
            	'codigo',
            	$carreras,
     			$car,//Seleccion de la carrera para filtro
     			['class'=>'select-carrera','placeholder'=>'Todas las carrera','required']) !!}

        </div>
        <hr>
		<table class="table table-hover">
			<thead>
				<th>Código</th>
				<th>Nombre</th>
				<th>Unidades Valorativas</th>
				<th>Estudiantes Matriculados</th>
				<th>Estudiantes Retirados</th>
			</thead>
			<tbody>
					
				@foreach ($mats as $mat) 
				<tr>
					
					<td>{{ $mat->codigo }}</td>
					<td>{{ $mat->nombre }}</td>
					<td>{{ $mat->unidades_valorativas }}</td>
					<td>{{ $mat->matricula }}</td>
					<td>{{ $mat->numero_retiros }}</td>
					
					<td>
						<a href=" {{route('materias.edit',$mat)}}"class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						<a href="{{route('materias.destroy',$mat)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>

				</tr>
			@endforeach

			</tbody>

		</table>
			{{$mats->render()}}
		</div>

			<!--          FIN Formulario            -->
                      </div>

              </div>

          </div>

@endsection