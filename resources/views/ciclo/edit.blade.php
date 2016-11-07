@extends('template.main')

@section('title', 'Actualizar ciclo')

@section('content')


 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Ciclo
            <small> Editar</small>
          </h1>
          <ol class="breadcrumb">
            
            <li class="active">editar</li>
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
                  <div class="panel-heading">Formulario editar Ciclo</div>
                  </div>

                  <!-- Aqui se mostrara el mensaje -->
                  @include('template.partials.mensaje')
	

              </div>

          </div>

          <div class="panel-body">
   			{!! Form::open(['route' => ['ciclo.update',$ciclo->id],'method'=>'PUT']) !!}  
   				
	   			<div class="form-group">
		            {!! Form::label('codigo','Código') !!}
		            {!!Form::text('codigo',$ciclo->codigo,['class'=>'form-control','placeholder'=>'C0I2016 CII20116','required' ])!!}
	          	</div>

	            <div class="form-group">
            		{!! Form::label('ciclo','Ciclo') !!}
            		{!! Form::text('ciclo',$ciclo->ciclo_academico,['class'=>'form-control','placeholder'=>' Ciclo I','required','pattern' => '[A-Za-z ]+' ])!!}  
          		</div>

          		<div class="form-group">
            		{!! Form::label('anio','Año') !!}
            		{!! Form::number( 'anio',$ciclo->anio_academico ,['class'=>'form-control','placeholder'=>' 2016','required', 'min'=>'2000', 'required'  ]) !!}  
          		</div>


          		<div>
	          		{!! form::label('fechaInicio', 'Fecha de inicio') !!}<br>
		              
		              	<input type="date" class="form-control" id="fechaInicio" name="fechaInicio" data-provide="datepicker" placeholder="mes/dia/año" required="true" data-date-format="yyyy-mm-dd" value="{{$ciclo->fecha_inicio}}" onchange="compararFechas()"><br>
		              
          		</div>
              
      			<div>              	
              		{!! form::label('fechaFin', 'Fecha de fin') !!}<br>
	              
	              	<input type="date" class="form-control" id="fechaFin" name="fechaFin" data-provide="datepicker" placeholder="mes/dia/año" required="true" value="{{$ciclo->fecha_inicio}}" data-date-format="yyyy-mm-dd" onchange="compararFechas()"><br>
	              
              </div>

              <div class="alert alert-warning" style="display: none" id="alertaCiclo">
              	<p><strong><font color="black">El ciclo no posee 16 semanas por favor revise las fechas</font> </strong> </p>
              </div>


              <div>
              		{!! form::label('cicloActivo', 'Ciclo activo') !!}<br>
              		<p>{!!Form::radio('cicloActivo', '1', true)!!} Si  <br>
              		{!!Form::radio('cicloActivo', '0', false)!!} No </p>
              </div>

          


              <div class="panel-body" disabled="false">

               {!! Form::submit('Guardar', ['class'=> 'btn-primary' ]) !!}  
         	</div>



          {!! Form::close()!!}

      </div>

         </div>
       </section>




@endsection


@section('js')

	<script>
		$('.datepicker').datepicker({
        startDate: '-3d'
    	});


		function compararFechas() {
			var finicio = document.getElementById('fechaInicio').value;
			var ffin= document.getElementById('fechaFin').value;

				var fecha1 = new Date(finicio);
				var fecha2 = new Date(ffin);

				var fecha3 = fecha2 - fecha1;

				var fecha = (((fecha3/1000.0)/60.0)/60)/24.0;
				

				if (fecha<112) {
					document.getElementById('alertaCiclo').style.display = 'block';
					
				}else{
					document.getElementById('alertaCiclo').style.display = 'none';
				}
				
		}

	</script>
	
      
@endsection('js')
