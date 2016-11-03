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
            <input name="numeroDeEvaluacones" type="number" id="numeroDeEvaluaciones" value="{{$numeroEvaluaciones}}"  disabled="false" class="form-control" onchange="mostrar(this.value) />

        </div> 


          <div class="table-responsive">
             <table class="table table-striped" > 

              <thead>
                <th id="1" style=" text-align: center;">Nota 1</th>
                <th id="2" style="text-align: center;">Nota 2</th>
                <th id="3" style=" text-align: center;">Nota 3</th>
                <th id="4" style="visibility: hidden; text-align: center;">Nota 4</th>
                <th id="5" style="visibility: hidden; text-align: center;">Nota 5</th>
                <th id="6" style="visibility: hidden; text-align: center;">Nota 6</th>
                <th id="7" style="visibility: hidden; text-align: center;">Nota 7</th>
                <th id="8" style="visibility: hidden; text-align: center;">Nota 8</th>
                <th id="9" style="visibility: hidden; text-align: center;">Nota 9</th>
                <th id="10" style="visibility: hidden; text-align: center;">Nota 10</th>
              </thead>
              <tbody>
                <tr>
                    <td><input class="form-control columna1" type="number" name="nota1" id="nota1" 
                    min="1" max="100" step="any" required="true" onchange="calcular(this.value)"></td>

                    <td><input class="form-control columna2" type="number" name="nota2" id="nota2"
                     min="1" max="100" step="any" required="true" onchange="calcular(this.value)"></td>

                    <td><input class="form-control columna3" type="number" name="nota3" id="nota3"
                    min="1" max="100" step="any" required="true" onchange="calcular(this.value)"></td>

                    <td><input class="form-control columna4" type="number" name="nota4" id="nota4" 
                    min="1" max="100" step="any" onchange="calcular(this.value)" ></td>

                    <td><input class="form-control columna5" type="number" name="nota5" id="nota5"
                    min="1" max="100" step="any" onchange="calcular(this.value)" ></td>

                    <td><input class="form-control columna6" type="number" name="nota6" id="nota6" 
                    min="1" max="100" step="any" onchange="calcular(this.value)" ></td>

                    <td><input class="form-control columna7" type="number" name="nota7" id="nota7" 
                    min="1" max="100" step="any" onchange="calcular(this.value)"></td>

                    <td><input class="form-control columna8" type="number" name="nota8" id="nota8" 
                    min="1" max="100" step="any" onchange="calcular(this.value)" ></td>

                    <td><input class="form-control columna9" type="number" name="nota9" id="nota9"  
                    min="1" max="100" step="any" onchange="calcular(this.value)"></td>

                    <td><input class="form-control columna10" type="number" name="nota10" id="nota10"  
                    min="1" max="100" step="any" onchange="calcular(this.value)"></td>
                </tr>
                   <tr>
                    <td><input class="form-control columna1" type="text" name="Descr1" placeholder="Descripcion" ></td>
                    <td><input class="form-control columna2" type="text" name="Descr2" placeholder="Descripcion" ></td>
                    <td><input class="form-control columna3" type="text" name="Descr3" placeholder="Descripcion" ></td>
                    <td><input class="form-control columna4" type="text" name="Descr4" placeholder="Descripcion"></td>
                    <td><input class="form-control columna5" type="text" name="Descr5" placeholder="Descripcion"></td>
                    <td><input class="form-control columna6" type="text" name="Descr6" placeholder="Descripcion"></td>
                    <td><input class="form-control columna7" type="text" name="Descr7" placeholder="Descripcion"></td>
                    <td><input class="form-control columna8" type="text" name="Descr8" placeholder="Descripcion"></td>
                    <td><input class="form-control columna9" type="text" name="Descr9" placeholder="Descripcion"></td>
                    <td><input class="form-control columna10" type="text" name="Descr10" placeholder="Descripcion"></td>
                </tr>
             </tbody>
            </table>
            
          </div>

           

        </div>  


        

        
        <input type="text" class="form-control" id="mensaje" name="" style="display: block;" value="EL BOTON DE GUARDADO APARECERA CUANDO LA SUMATORIA DE LOS PORCENTAJE SEA DE 100" >

        <div class="panel-body" id="guardar" style="display: none;">

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
           //codigo para cuando aumente las evaluaciones
        var au = 0.0;
        var v = document.getElementById('numeroDeEvaluaciones').value;

        var cantidad = parseInt(v) ;
        
        

        if (cantidad<3 || cantidad>10) {
            alert("El numero minimo de evaluaciones es 3 y el maximo 10");
        }else{
           
            if (au <= cantidad ) {
        
        
                var t = 300 - (v*21);

                 for (var i = 1; i <=cantidad; i++) {

                   if(i<4){         
                        $(".columna"+i).css("width", t+"px");     
                  }else{
                        $(".columna"+i).css("width", t+"px");

                        var z = $(".columna"+i).css("display");                          
                          if (z == "block") {

                          }else{
                            $(".columna"+i).css("display", "block");
                            document.getElementById(i).style.visibility = 'visible';
                          }
                                          
                    
                  }
                }
                //alert("entro en aumento");   
              }else{//aca termina la parte de aumento

                var t = 90 + ((10-v) *21);

                    for (var i = 10; i >cantidad; i--) {
                      var c = 11-i;
                   if(i<4){         
                        $(".columna"+c).css("width", t+"px");     
                    }else{
                        $(".columna"+c).css("width", t+"px");

                        var z = $(".columna"+i).css("display");                          
                          if (z == "none") {

                          }else{
                            $(".columna"+i).css("display", "none");
                            document.getElementById(i).style.visibility = 'hidden';
                          }
                                          
                    
                  }
                     
                }
                //alert("entro en dismuncion"); 
                }
      }
    }


  window.onload=function() {

      mostrar();

      document.getElementById('numeroEvaluaciones').disabled = true;

      
    }



    function calcular($valor) {
        
      var por =0.0;
      
        for(i=1; i<=10; i++){
         var porcen  =    document.getElementById("nota"+i).value;
         var numero = parseFloat(porcen);

         if (numero >0) {
            por = por + numero;
         }
          

        }

        
        if (por==100) {
          document.getElementById('guardar').style.display = 'block';
          document.getElementById('mensaje').style.display = 'none';
        }else{
          document.getElementById('guardar').style.display = 'none';
          document.getElementById('mensaje').style.display = 'block';
        }

    }


  </script>

@endsection('js')