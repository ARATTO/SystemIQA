@extends('template.main')

@section('title', 'Insertar notas')

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


        {!! Form::open(['action' => 'IngresarNotasController@store' ]) !!}
       


         @include('flash::message')

        <div id="panel" class="panel panel-primary">
          <div class="panel-heading">
              <div>
                <h3>{{'Ingresar Notas '}}</h3>
              </div>
        
          </div>


         <div class="panel-body">

            <table class="table table-striped" > 

              <thead>
                <th>Nombre</th>
                @foreach($evaluacion as $porcentaje)

                  @if($porcentaje->materia->id == $materiaSeleccionada)
           
                        <th>{{$porcentaje->porcentaje}} </th>
                  @endif
            
                @endforeach
              </thead>
              <tbody>
              @foreach($materiaInscrita as $alumno)
                  <tr>
                      <td>{{$alumno->estudiante->apellido}}  {{$alumno->estudiante->nombre}}</td>
                   
                    @foreach($evaluacion as $porcentaje)

                      @foreach($join as $calificacion)
                            @if($porcentaje->materia->id == $materiaSeleccionada)

                                @if($calificacion->evaluacion_id == $porcentaje->id && $alumno->estudiante->id == $calificacion->estudiante_id)
                 
                                  <td><input type="number" name="{{$calificacion->id}}" value="{{$calificacion->nota_evaluacion}}" min="0.0" max="10" step="0.01"></td> 
                                @endif
                            @endif
                      @endforeach
                    @endforeach

                  </tr>
              @endforeach
                
              </tbody>
              

            </table>
              
        </div>  

            
        <div class="panel-body">
               {!! form::submit('Guardar', ['class'=> 'btn-primary' ]) !!}  
         </div>
              

        </div>
          
    </div>

        {!! Form::close() !!}

        <div class="form-group">



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
          
            alert("El numero minimo de evaluaciones es 3 y el maximo 10");
        }else{
            for (paso = 1; paso <=v; paso++) {
            document.getElementById(paso).style.display = 'block';
          }

           alert("evaluaciones agregadas");
        }

      
      }
      


  </script>

@endsection('js')