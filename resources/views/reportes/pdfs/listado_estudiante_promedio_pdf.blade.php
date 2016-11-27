<!DOCTYPE html>
<html>
<head>
	<title>Listado Estudiantes</title>
	<!-- Elias -->
	<link rel="stylesheet" href="plugins/chosen/chosen.min.css" type="text/css">
	<link rel="stylesheet" href="css/reporte.css" type="text/css">
	<link rel="icon" href="/UES.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="/UES.ico" type="image/x-icon"/>
</head>
<body>
	<div class="panel panel-info text-center ">
		<h1>Universidad de El Salvador</h1>
		</br>
		<h2>Facultad de Ingeniería y Arquitectura</h2>
		</br>
		<h3>Escuela de Química y Alimentos</h3>
		<h4>
			Carrera: <small>{{$carrera->codigo}} {{$carrera->nombre}}</small>  
			Materia: <small>{{$materia->codigo}} {{$materia->nombre}}</small> 
		</h4>
		
	</div>



	<table class="table table-striped" style="border: 1px solid #33b5e5">
		<thead class="thead-inverse">
			<tr>
				<th>Carnet</th>
				<th>Apellidos</th>
				<th>Nombres</th>
				<th>CUM</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($estudiantes as $estudiante ) 
			<tr>
				<td>{{$estudiante->carnet}}</td>	
				<td>{{$estudiante->apellido}}</td>
				<td>{{$estudiante->nombre}}</td>
				<td>{{$estudiante->CUM}}</td>
			</tr>
			@endforeach		
		</tbody>
	</table>
	
</body>
</html>