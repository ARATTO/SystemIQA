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


        {!! Form::open(['action' => 'PorcentajeNotasController@store' ]) !!}

        <div style="display:none">
            {{ form::text('IdCarrera', $carrera->id , null, ['class' => 'form-control ']) }}  
        </div>
        


         @include('flash::message')

        <div id="panel" class="panel panel-primary">
            <div class="panel-heading">
                <div>
                  <h3>{{'Crear porcentaje de notas de '.$carrera->nombre}}</h3>
                </div>
          
            </div>


           <div class="panel-body">
                {!! form::label('id', 'Materias') !!}
                {!! form::select('id', $mis_materias, null, ['class' => 'form-control ', 'placeholder'=> 'Seleccione una materia', 'required']) !!}
          </div>  


           <div id ="NumeroEvaluaciones"  class="panel-body">
                {!! form::label('numeroDeEvaluaciones', 'Numero de evaluaciones') !!}
              <input name="numeroDeEvaluacones" type="number" id="numeroDeEvaluaciones" value="3"  class="form-control"  placeholder="5" />

          </div> 


          <div class="form-group">
              <input type="button" value="Añadir" onclick="mostrar()" class="btn-primary"> 
          </div>


          <div class="table-responsive">
             <table class="table table-striped" > 

              <thead>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Nota 4</th>
                <th>Nota 5</th>
                <th>Nota 6</th>
                <th>Nota 7</th>
                <th>Nota 8</th>
                <th>Nota 9</th>
                <th>Nota 10</th>
              </thead>
              <tbody>
                <tr>
                    <td><input type="number" name="nota"  style="width: 90px;"> </td>
                    <td><input type="number" name="nota"  style="width: 90px;"> </td>
                    <td><input type="number" name="nota"  style="width: 90px;"> </td>
                    <td><input type="number" name="nota"  style="width: 90px;"> </td>
                    <td><input type="number" name="nota"  style="width: 90px;"> </td>
                    <td><input type="number" name="nota"  style="width: 90px;"> </td>
                    <td><input type="number" name="nota"  style="width: 90px;"> </td>
                    <td><input type="number" name="nota"  style="width: 90px;"> </td>
                    <td><input type="number" name="nota"  style="width: 90px;"> </td>
                    <td><input type="number" name="nota"  style="width: 90px;"> </td>
                </tr>
                   <tr>
                    <td><input type="text" name="Descr" placeholder="Descripcion nota"  style="width: 90px;"> </td>
                    <td><input type="text" name="Descr" placeholder="Descripcion nota"  style="width: 90px;"> </td>
                    <td><input type="text" name="Descr" placeholder="Descripcion nota"  style="width: 90px;"> </td>
                    <td><input type="text" name="Descr" placeholder="Descripcion nota"  style="width: 90px;"> </td>
                    <td><input type="text" name="Descr" placeholder="Descripcion nota"  style="width: 90px;"> </td>
                    <td><input type="text" name="Descr" placeholder="Descripcion nota"  style="width: 90px;"> </td>
                    <td><input type="text" name="Descr" placeholder="Descripcion nota"  style="width: 90px;"> </td>
                    <td><input type="text" name="Descr" placeholder="Descripcion nota"  style="width: 90px;"> </td>
                    <td><input type="text" name="Descr" placeholder="Descripcion nota"  style="width: 90px;"> </td>
                    <td><input type="text" name="Descr" placeholder="Descripcion nota"  style="width: 90px;"> </td>
                </tr>
             </tbody>
            </table>
            
          </div>

           

        </div>  


        

            
        <div class="panel-body">
               {!! form::submit('Guardar', ['class'=> 'btn-primary' ]) !!}  
         </div>
              

        </div>
          
    </div>


        <div class="form-group">


        {!! Form::close() !!}

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

@section('js')
  <script type="text/javascript">
      function mostrar($id){

        
        var v = document.getElementById('numeroDeEvaluaciones').value;
         
        if (v<3 || v>10) {
            //alert("El numero minimo de evaluaciones es 3 y el maximo 10");
        }else{
            for (paso = 1; paso <=v; paso++) {
            document.getElementById(paso).style.display = 'block';
          }
        }

      
      };
      


  </script>

@endsection('js')