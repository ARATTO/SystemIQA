<div id="contenedor_formulario" class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">@yield('title_panel','Asignaturas')</h3>
      </div>
        @include('flash::message')
      <div class="panel-body">

        @section('title', 'Control')
        
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
				<a href="javascript:void(0);" onclick="cargarformulario2(17,{{$mat->id}});"class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
				<a href="{{route('eliminar_materia',$mat)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
			</td>

		</tr>
	@endforeach

	</tbody>

</table>
{{$mats->render()}}
</div>
<script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>

<script	>

      $(document).ready(function(){
        document.title.attr
        document.title="Listado de Asignaturas";
      });


$('.select-carrera').chosen({

        placeholder_text_single:'Seleccione una carrera'
      });


      $('#codigo').change(function(){     
      	
      	if($('#codigo').val()){
      		
			var url = "materias_pivote/"+$('#codigo').val(); 
			
	      	}else{
	      		var url = "materias/materias"; 
	      	}

			$("#contenido_principal").html($("#cargador_empresa").html());

			$.get(url,function(resul)
				{
					$("#contenido_principal").html(resul);})

        });


		  
      </script>
</div>