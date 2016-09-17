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


        {!! Form::open(['action' => 'PorcentajeNotasController@show', $carreras]) !!}



        <div id="panel" class="panel panel-primary">
          <div class="panel-heading">
              <div>
                <h3>Seleccionar Carrera</h3>
              </div>
        
          </div>

          <div class="panel-body">

              {!! form::label('nombre', 'Carrera') !!}
              {!! form::select('id', $carreras, null, ['class' => 'form-control select-category', 'placeholder' => 'Seleccione una carrera', 'required']) !!}
          </div>  

   

            <div class="form-group">
              
              {!! form::submit('Siguiente', ['class'=> 'btn-primary']) !!}

        </div>
          
          </div>
        </div>

          




        <div class="form-group">


        {!! Form::close() !!}

        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">

@endsection
        
      


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



