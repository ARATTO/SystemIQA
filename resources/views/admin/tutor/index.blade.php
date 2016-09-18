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
				<td><a href="" class="btn btn-danger"></a> <a href="" class="btn btn-warning"></a></td>
			</tr>
		@endforeach
	</tbody>
</table>

{!! $tutors->render() !!}



</div>
</div>
