@extends('template.main')

@section('title', 'Carrera | Listado')
 
@section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Carrera
            <small> Listado</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('carreras.index')}}"><i class="fa fa-dashboard"></i>Carrera</a></li>
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
                  <div class="panel-heading">Listado de Carreras</div>
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
				<th>Nombre</th>
				<th>Descripcion</th>
			</thead>
			<tbody>
					
				@foreach ($carreras as $car) 
				<tr>
					
					<td>{{ $car->codigo }}</td>
					<td>{{ $car->nombre }}</td>
					<td>{{ $car->descripcion }}</td>

					
					<td>
						<a href=" {{route('carreras.edit',$car)}}"class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						<a href="{{route('carreras.destroy',$car)}}" onclick="return confirm('¿Deseas Eliminar esta carrera?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>

				</tr>
			@endforeach

			</tbody>

		</table>
			{{$carreras->render()}}
		</div>

			<!--          FIN Formulario            -->
                      </div>

              </div>

          </div>

@endsection