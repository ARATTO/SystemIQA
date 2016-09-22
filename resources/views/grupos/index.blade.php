@extends('template.main')

@section('title', 'Grupo | Listado')

@section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Grupos
            <small> Listado</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('grupos.index')}}"><i class="fa fa-dashboard"></i>Grupos</a></li>
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
                  <div class="panel-heading">Listado de Grupos</div>
                  </div>

                  <!-- Aqui se mostrara el mensaje -->
                  @include('template.partials.mensaje')
                    <div class="col-xs-12">
                    <!--          Formulario            -->
      	<div class="panel-body">

        <hr>
		<table class="table table-hover">
			<thead>
				<th>Código</th>
				<th>Asignatura</th>
				<th>Tipo</th>
        <th>Horario</th>
        <th>Cantidad de estudiantes</th>

			</thead>
			<tbody>
					
				@foreach ($grupos as $grupo) 
				<tr>
					
					<td>{{ $grupo->codigo }}</td>
					<td>{{ $grupo->materia->nombre}}</td>
					<td>{{ $grupo->tipo_grupo->nombre }}</td>
          <td>{{ $grupo->horario }}</td>
          <td>{{ $grupo->cantidad_estudiante }}</td>
					
					<td>
						<a href=" {{route('grupos.edit',$grupo->id)}}"class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						<a href="{{route('grupos.destroy',$grupo->id)}}" onclick="return confirm('¿Deseas Eliminar este grupo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>

				</tr>
			@endforeach

			</tbody>

		</table>
			{{$grupos->render()}}
		</div>

			<!--          FIN Formulario            -->
                      </div>

              </div>

          </div>

@endsection