@extends('template.main')

@section('title', 'Lista de Tutores')

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
            Tutores
            <small> panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/users') }}"><i class="active fa fa-dashboard"></i>Tutores</a></li>
          </ol>
        </section>


        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">
<a href="{{ route('tutor.create') }}" class="btn btn-info"> Registrar nuevo tutor </a><hr>

<div class="box box-primary">

<div class="box-header">
<h3 class="box-little">Tutores encontrados</h3>
</div>

<div class="box-body">
	
<table class="table table-stripped">
	<thead>
		<th>ID</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Telefono</th>
		<th>Usuario_id</th>
		<th>Acción</th>
	</thead>
	<tbody>
		@foreach($tutors as $tutor)
			<tr>
				<td>{{ $tutor->id }}</td>
				<td>{{ $tutor->nombre }}</td>
				<td>{{ $tutor->apellido }}</td>
				<td>{{ $tutor->telefono }}</td>
				<td>{{ $tutor->usuario_id }}</td>
				<td><a href="{{ route('admin.tutor.destroy', $tutor->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a> <a href="" class="btn btn-warning"></a></td>
			</tr>
		@endforeach
	</tbody>
</table>

{!! $tutors->render() !!}

          </section>


</div>
</div>
@endsection