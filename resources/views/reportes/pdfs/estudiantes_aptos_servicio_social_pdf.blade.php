
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
		<div class="text-xs-center">
		  <img src="./dist/img/systemiqa/UES.jpg" class="rounded mx-auto d-block" style="width: 100px" alt="Universidad de El Salvador Logo">
		</div>
		<h4>
			Estudiantes que estan aptos para iniciar su Servicio Social
			<br>
			<small>Servicio Social</small>
		</h4>
				
	</div>



	<table class="table table-stripped " style="border: 1px solid #33b5e5">
	  <thead>
	  	<tr>
		    <th>Carnet</th>
		    <th>Nombre</th>
		    <th>Apellido</th> 
		    <th>Servicio Social</th>
		    <th>Progreso de carrera</th>
	   	</tr>
	  </thead>
	  <tbody>
	    @foreach($estudiantes as $mat)
	      <tr>
	        <td>{{ $mat->estudiante->carnet }}</td>
	        <td>{{ $mat->estudiante->nombre }}</td>
	        <td>{{ $mat->estudiante->apellido }}</td>
	        @if(($mat->estudiante->materias_ganadas/46)*100 >= 60)
              <td><div  name="confirmo">APTO PARA SERVICIO SOCIAL</div></td> 
            @else
              <td><div  name="confirmo">NO APTO PARA SERVICIO SOCIAL</div></td>
            @endif

	        <td> {{round(($mat->estudiante->materias_ganadas/46)*100, 2)}}%</td>
	      </tr>
	    @endforeach
	  </tbody>
	</table>
	
</body>
</html>