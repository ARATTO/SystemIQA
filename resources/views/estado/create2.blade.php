@extends('template.main')

@section('title', 'Estado Global Estudiante')

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


        {!! Form::open(['action'=>'EstudianteController@show2']) !!}


          <!-- contenido principal -->
          <section class="content"  id="contenido_principal">

       <div class="form-group">

          <div id="panel" class="panel panel-primary">
            <div class="panel-heading">
                <div>
                  <h3>Seleccionar Materia</h3>
                </div>


          
            </div>

            @include('flash::message')

            <div class="panel-body">
                <div>
                  {!! form::label('nombre', 'Carrera') !!}
                  {!! form::select('id', $carrera, null, ['class' => 'form-control', 'name'=>'CarreraElejida', 'id'=>'CarreraElejida', 'placeholder'=>'seleccione una carrera' , 'required']) !!}  
                </div>

                
<!--
                <hr>

                <div id="2" class="form-grup" style="display:none">
                   {!! form::label('nombre', 'Materia Alimentos') !!}
                  <select name="materiasAlimentos" id="materiasAlimentos" class="form-control selectpicker">
                    @foreach($materias as $materia)
                        @foreach ($materia->carreras as $v)
                            @if($v->id == 2)
                              <option id="hola" value= {{$materia->id}} > {{$materia->nombre}} </option>
                            @endif  
                        @endforeach
                    @endforeach
                </select>
                </div>
                              

                <hr>
               <div id="1" class="form-grup" style="display:none">
                   {!! form::label('nombre', 'Materia Quimica') !!}
                  <select name="materiasQuimica" id="materiasQuimica" class="form-control selectpicker">
                    @foreach($materias as $materia)
                        @foreach ($materia->carreras as $v)
                            @if($v->id == 1)
                              <option  id="valor" value= {{$materia->id}} > {{$materia->nombre}} </option>
                            @endif  
                        @endforeach
                    @endforeach
                </select>
                </div>     
-->
                

                



              <div class="form-group">
                <hr>
                {!! form::submit('Siguiente', ['class'=> 'btn-primary']) !!}

              </div>
            
       
        </div>

              
      
           {!! Form::close() !!}

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

  function cambio(){

    return document.getElementById('CarreraElejida').value;
  }


    $("#CarreraElejida").change(
            function(){
               // alert( document.getElementById('CarreraElejida').value );

                if(document.getElementById('CarreraElejida').value == 1){
                  document.getElementById(1).style.display = 'block'; 
                  document.getElementById(2).style.display = 'none';  
                }else{
                  document.getElementById(1).style.display = 'none'; 
                  document.getElementById(2).style.display = 'block';  
                }
             

            }

      );

  </script>

@endsection('js')
