@extends('template.main')

@section('title', 'Editar porcentaje')

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


        {!! Form::open(['route' => array('Pnotas.update', $mis_materias),  'method' => 'PUT']) !!}      

         @include('flash::message')

        <div id="panel" class="panel panel-primary">
          <div class="panel-heading">
              <div>
                <h3>{{'Editar porcentaje de notas'}}</h3>
              </div>
        
          </div>


          <div id ="valoresEvaluacion" style='display:none;' class="panel-body">

          @foreach($evaluaciones as $eva)
            {!! form::label('NEID', 'evaluaciones') !!}
            {!! form::text('NEID',  $eva->id, ['class' => 'form-control']) !!}
          @endforeach
          
           {!! form::label('NERE', 'evaluaciones') !!}
           {!! form::text('NERE',  $numeroEvaluaciones, ['class' => 'form-control']) !!}

            {!! form::label('IDMAT', 'evaluaciones') !!}
           {!! form::text('IDMAT',  $mis_materias->id, ['class' => 'form-control']) !!}
        </div> 


         <div class="panel-body">
              {!! form::label('nombreMateria', 'Materias') !!}
              {!! form::text('nombreMateria', $mis_materias->nombre, ['class' => 'form-control ','required', 'disabled'=> 'false']) !!}
        </div>  


         <div id ="NumeroEvaluaciones"  class="panel-body">
              {!! form::label('numeroDeEvaluaciones', 'Numero de evaluaciones') !!}
            <input name="numeroDeEvaluacones" type="number" id="numeroDeEvaluaciones" value="{{$numeroEvaluaciones}}" disabled="false"  class="form-control" />

        </div> 


        <div class="form-group">
            <input type="button" value="Añadir" onclick="mostrar()" class="btn-primary" > 
        </div>



         <div id ="1" style='display:block;' class="panel-body">
             {!! form::label('Evaluacion1', 'Porcentaje evaluacion 1') !!}
              {!! form::number('Evaluacion1',  null, ['class' => 'form-control ', 'placeholder'=> '10', 'required']) !!}
              <br>
              {!! form::label('descripcion1', 'Descripcion de la evaluacion 1') !!}
              {!! form::text('descripcion1',  null, ['class' => 'form-control ', 'placeholder'=> 'Examen parcial', 'required']) !!}
              <hr>

        </div> 


         <div id ="2" style='display:block;' class="panel-body">
              {!! form::label('Evaluacion2', 'Porcentaje evaluacion 2') !!}
              {!! form::number('Evaluacion2',  null, ['class' => 'form-control ', 'placeholder'=> '10', 'required']) !!}
              <br>
             {!! form::label('descripcion2', 'Descripcion de la evaluacion 2') !!}
              {!! form::text('descripcion2',  null, ['class' => 'form-control ', 'placeholder'=> 'Examen parcial', 'required']) !!}
              <hr>

        </div> 


         <div id ="3" style='display:block;' class="panel-body">
              {!! form::label('Evaluacion3', 'Porcentaje evaluacion 3') !!}
              {!! form::number('Evaluacion3',  null, ['class' => 'form-control ', 'placeholder'=> '10', 'required']) !!}
              <br>
             {!! form::label('descripcion3', 'Descripcion de la evaluacion 3') !!}
              {!! form::text('descripcion3',  null, ['class' => 'form-control ', 'placeholder'=> 'Examen parcial', 'required']) !!}
              <hr>
        </div> 

         <div id ="4" style='display:none;' class="panel-body">
              {!! form::label('Evaluacion4', 'Porcentaje evaluacion 4') !!}
              {!! form::number('Evaluacion4',  null, ['class' => 'form-control ', 'placeholder'=> '10']) !!}
               <br>
              {!! form::label('descripcion4', 'Descripcion de la evaluacion 4') !!}
              {!! form::text('descripcion4',  null, ['class' => 'form-control ', 'placeholder'=> 'Examen parcial']) !!}
              <hr>
        </div> 

         <div id ="5" style='display:none;' class="panel-body">
              {!! form::label('Evaluacion5', 'Porcentaje evaluacion 5') !!}
              {!! form::number('Evaluacion5',  null, ['class' => 'form-control ', 'placeholder'=> '10']) !!}
               <br>
             {!! form::label('descripcion5', 'Descripcion de la evaluacion 5') !!}
              {!! form::text('descripcion5',  null, ['class' => 'form-control ', 'placeholder'=> 'Examen parcial']) !!}
              <hr>
        </div> 

         <div id ="6" style='display:none;' class="panel-body">
              {!! form::label('Evaluacion6', 'Porcentaje evaluacion 6') !!}
              {!! form::number('Evaluacion6',  null, ['class' => 'form-control ', 'placeholder'=> '10']) !!}
               <br>
              {!! form::label('descripcion6', 'Descripcion de la evaluacion 6') !!}
              {!! form::text('descripcion6',  null, ['class' => 'form-control ', 'placeholder'=> 'Examen parcial']) !!}
              <hr>
        </div> 



         <div id ="7" style='display:none;' class="panel-body">
              {!! form::label('Evaluacion7', 'Porcentaje evaluacion 7') !!}
              {!! form::number('Evaluacion7',  null, ['class' => 'form-control ', 'placeholder'=> '10']) !!}
                 <br>
                {!! form::label('descripcio7', 'Descripcion de la evaluacion 7') !!}
              {!! form::text('descripcion7',  null, ['class' => 'form-control ', 'placeholder'=> 'Examen parcial']) !!}
              <hr>

        </div> 

         <div id ="8" style='display:none;' class="panel-body">
              {!! form::label('Evaluacion8', 'Porcentaje evaluacion 8') !!}
              {!! form::number('Evaluacion8',  null, ['class' => 'form-control ', 'placeholder'=> '10']) !!}
              <br>
              {!! form::label('descripcion8', 'Descripcion de la evaluacion 8') !!}
              {!! form::text('descripcion8',  null, ['class' => 'form-control ', 'placeholder'=> 'Examen parcial']) !!}
              <hr>

        </div>                                         


         <div id ="9" style='display:none;' class="panel-body">
              {!! form::label('Evaluacion9', 'Porcentaje evaluacion 8') !!}
              {!! form::number('Evaluacion9',  null, ['class' => 'form-control ', 'placeholder'=> '10']) !!}
              <br>
              {!! form::label('descripcion9', 'Descripcion de la evaluacion 9') !!}
              {!! form::text('descripcion9',  null, ['class' => 'form-control ', 'placeholder'=> 'Examen parcial']) !!}
              <hr>

        </div> 

         <div id ="10" style='display:none;' class="panel-body">
              {!! form::label('Evaluacion10', 'Porcentaje evaluacion 9') !!}
              {!! form::number('Evaluacion10',  null, ['class' => 'form-control ', 'placeholder'=> '10']) !!}
                            <br>
              {!! form::label('descripcion10', 'Descripcion de la evaluacion 10') !!}
              {!! form::text('descripcion10',  null, ['class' => 'form-control ', 'placeholder'=> 'Examen parcial']) !!}
              <hr>



        </div>  


        

            
        <div class="panel-body">
               {!! form::submit('Editar', ['class'=> 'btn-primary' ]) !!}  
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

@section('js')
  <script type="text/javascript">
      function mostrar(){
        var v = document.getElementById('numeroDeEvaluaciones').value;
         
        if (v<3 || v>10) {
            //alert("El numero minimo de evaluaciones es 3 y el maximo 10");
        }else{
            for (paso = 1; paso <=v; paso++) {
            document.getElementById(paso).style.display = 'block';
          }
        }

      
      };


  window.onload=function() {

      mostrar();

      document.getElementById('numeroEvaluaciones').disabled = true;

     //alert('funciono');

    }

  </script>

@endsection('js')