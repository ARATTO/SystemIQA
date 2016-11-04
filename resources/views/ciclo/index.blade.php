@extends('template.main')

@section('title', 'lista de porcentajes')

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

	<a href="{{url('/crearCiclo')}}" class="btn btn-info">Registrar nuevo ciclo</a><hr>
	
	  @include('flash::message')
	<table class="table table-striped" > 
		<thead>
      <th>Ciclo</th>
			<th>Año academico</th>
			<th>Fecha inicio</th>
      <th>Fecha fin</th>
		</thead>
		<tbody>
			@foreach($ciclos as $ciclo)
				<tr>
					<td>{{$ciclo->ciclo_academico}} </td>
					<td>{{$ciclo->anio_academico}} </td>
          <td>{{$ciclo->fecha_inicio}} </td>
          <td>{{$ciclo->fecha_fin}} </td>
					<td> 
						<a href=" " class="btn btn-warning"> <font color="black" size="2"> <b>Editar</b> </font>  </a>  
						<a href=" " onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><font color="black" size="2"> <b>Eliminar	</b>  </font></a>  
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