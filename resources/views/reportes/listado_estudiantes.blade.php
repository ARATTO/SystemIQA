
@extends('template.main')

@section('title', 'Reporte | Estudiantes')

@section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Estudiantes
            <small> Lista</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{route('reportes.listado_estudiantes')}}"><i class="fa fa-dashboard"></i>Estudiante</a></li>
            <li class="active">Nuevo</li>
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
        <div class="panel-heading">Generar Listado de Estudiantes</div>

      </div>
                  <!-- Aqui se mostrara el mensaje -->
      @include('template.partials.mensaje')
      <div class="col-xs-12">
                    <!--          Formulario            -->
      
      <div class="panel-body">
          {!! Form::open(['route' => ['reportes.pdf_listado_estudiantes'],'method'=>'GET','target'=>"_blank"])!!}
          {!! Form::label('nombre', 'Carrera') !!}
          {!! Form::select('id', $carrera, null, ['class' => 'form-control', 'name'=>'CarreraElegida', 'id'=>'CarreraElegida', 'placeholder'=>'seleccione una carrera' , 'required']) !!}  
        
          <hr>
          <div id="1" class="form-grup" style="display:none">
          {!! Form::label('nombre', 'Materia Quimica') !!}
            <select name="materia_elegida" id="materia_elegida" class="form-control selectpicker" >

              @foreach($materias as $materia)
                  @foreach ($materia->carreras as $v)
                      @if($v->id == 1)
                        <option id="hola" value= '{{$materia->id}} '> {{$materia->nombre}} </option>
                      @endif  
                  @endforeach
              @endforeach
            </select>
          </div>
                              

          
         <div id="2" class="form-grup" style="display:none">
             {!! Form::label('nombre', 'Materia Alimentos') !!}
            <select name="materia_elegida" id="materia_elegida" class="form-control selectpicker" >
              @foreach($materias as $materia)
                  @foreach ($materia->carreras as $v)
                      @if($v->id == 2)
                        <option  id="valor" value= '{{$materia->id}} '> {{$materia->nombre}} </option>
                      @endif  
                  @endforeach
              @endforeach
          </select>
          </div>                  

        <div class="form-group">
          <hr>
          {!! Form::submit('Generar PDF', ['class'=> 'btn-primary']) !!}
              
        </div>
      </div>   
      <!--          FIN Formulario            --> 
  </div>

@endsection


@section('js')
  <script type="text/javascript">

  function cambio(){

    return document.getElementById('CarreraElegida').value;
  }


    $("#CarreraElegida").change(
            function(){
               // alert( document.getElementById('CarreraElejida').value );

                if(document.getElementById('CarreraElegida').value == 1){
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