@extends('template.main')

@section('title', 'Alumnos en tutorias')

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
	
	  @include('flash::message')
	<table class="table table-striped" > 
		<thead>
      <th>Materia</th>
			<th>Tutor</th>
			<th>Fecha</th>
      <th>Hora</th>
		</thead>
		<tbody>
			@foreach($tutorias as $tutoria)
				<tr>
          <td>{{$tutoria->materia->nombre}} </td>
					<td>{{$tutoria->tutor->nombre}} </td>
          <td>{{$tutoria->fecha_grupo}} </td>
          <td>{{$tutoria->hora}} </td>

					<td> 
            <a href="{{route('estado.vista',$tutoria->id)}}" class="btn btn-success"> <font color="black" size="2"> <b>ver Estudiantes</b> </font>  </a> 
            <a href=" {{route('estado.destroy',$tutoria->id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><font color="black" size="2"> <b>Borrar</b>  </font></a> 
						</td>
				</tr>
			@endforeach
		</tbody>
	</table>



        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">






        </section>

      <!-- cargador empresa -->
        <div style="display: none;" id="cargador_empresa" align="center">
            <br>


         <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>

         <img src="imagenes/cargando.gif" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Realizando tarea solicitada ...</label>

          <br>
         <hr style="color:#003" width="50%">
         <br>
       </div>





      </div><!-- /.content-wrapper -->




    </div><!-- ./wrapper -->
@endsection