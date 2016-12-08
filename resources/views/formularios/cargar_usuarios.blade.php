@extends('template.main')

@section('title', 'Estudiantes | Nuevo')

@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Estudiantes
            <small> Nuevo</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/users') }}"><i class="fa fa-dashboard"></i>Estudiantes</a></li>
            <li class="active">Nuevo</li>
          </ol>
        </section>

        {!! Form::open(['action'=>'FormulariosController@cargar_datos_usuarios','files'=>true]) !!}

        

        <div id ="valoresUtilizables" style='display:none;' class="panel-body">
          
           {!! Form::label('carrera', 'carreraS') !!}
           {!! Form::text('carrera',  $carreraSeleccionada, ['class' => 'form-control']) !!}

           {!! Form::label('materia', 'materiaS') !!}
           {!! Form::text('materia',  $materiaSeleccionada, ['class' => 'form-control']) !!}

           
        </div> 

        




        <!-- contenido principal HACER INPUT Y HIDDEN -->
        <section class="content"  id="contenido_principal">

        @include('flash::message')

          

          <div>
    
      <div class="box box-primary">
                      <div class="box-header">
                        <h3 class="box-title">Cargar Datos de Estudiantes</h3>
                      </div><!-- /.box-header -->
     
      <div id="notificacion_resul_fcdu"></div>

      <!--form-->                
      
      
      <!--input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"--> 

      <div class="box-body">

      <div class="form-group" >
        {!! Form::label('grupo', 'Seleccione el grupo teorico') !!}
        {!! form::select('id', $grupos, null, ['class' => 'form-control select-category', 'placeholder' => 'Seleccione un grupo', 'required']) !!}
      </div>

      <div  class="form-group">
        {!! Form::label('docente', 'Seleccione el docente a impartir la materia') !!}
        {!! form::select('docente', $docentes, null, ['class' => 'form-control select-category', 'placeholder' => 'Seleccione un docente', 'required']) !!}
      </div>
          
      <div  >
             <label>Agregar Archivo de Excel </label>
              <input name="archivo" id="archivo" type="file"   class="archivo form-control"  required/><br /><br />
      </div>
      <div class="box-footer" style='display:none;'>
                  
                  {!! Form::submit('exito', ['id'=>'f_cargar_datos_usuarios', 'name'=>'f_cargar_datos_usuarios', 'method'=>'post', 'class'=>'formarchivo', 'enctype'=>'multipart/form-data' ]) !!}
                  {!! Form::token()!!}
                          </div>

        {!! Form::close() !!}

      <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Cargar Datos</button>
      </div>
    

      </div>

      <!--/form-->

      </div>
      
        </section>



@endsection




  

