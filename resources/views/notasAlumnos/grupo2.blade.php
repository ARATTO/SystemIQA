@extends('template.main')

@section('title', 'Crear porcentaje de notas')

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


{!! Form::open(['action' => 'IngresarNotasController@show2']) !!}
           @include('flash::message')

<section class="content"  id="contenido_principal">

   <div class="form-group">

      <div id="panel" class="panel panel-primary">
        <div class="panel-heading">
            <div>
              <h3>Seleccionar Grupo</h3>
            </div>
      
        </div>	

     <div class="panel-body">

     	<div class="form-group">

			{!! form::label('grupo', 'Seleccione un grupo') !!}
            {!! form::select('grupo', $grupos, null, ['class' => 'form-control', 'name'=>'grupo', 'id'=>'grupo', 'placeholder'=>'seleccione una grupo' , 'required']) !!}  
     	</div>



     	<div style="display: none;">
     		<input type="text" name="CarreraElejida" value="{{$CarreraElejida}}">	
     	</div>

     	<div style="display: none;">
     		<input type="text" name="materiasAlimentos" value="{{$materiasAlimentos}}">	
     	</div>

     	<div style="display: none;">
     		<input type="text" name="materiasQuimica" value="{{$materiasQuimica}}">	
     	</div>

     	<div style="display: none;">
     		<input type="text" name="docente" value="{{Auth::user()->id}}">	
     	</div>


              <div class="form-group">
                <hr>
                {!! form::submit('Siguiente', ['class'=> 'btn-primary']) !!}

              </div>

     </div>

</section>

	</div>

	  {!! Form::close() !!}


@endsection