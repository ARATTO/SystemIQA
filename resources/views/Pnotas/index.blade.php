@extends('template.main')

@section('title', 'lista de porcentajes')

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

  <a href="{{url('/elejirCarrera')}}" class="btn btn-info">Registrar nuevo porcentaje</a><hr>
  
    @include('flash::message')
  <table class="table table-striped" > 
    <thead>
      <th>Codigo</th>
      <th>Materia</th>
      <th>Accion</th>
    </thead>
    <tbody>
      @foreach($evaluaciones as $evaluacion)
        <tr>
          <td>{{$evaluacion->materia->codigo}} </td>
          <td>{{$evaluacion->materia->nombre}} </td>
          <td> 
            <a href=" {{route('Pnotas.ver',$evaluacion->materia_id)}}" class="btn btn-success"> <font color="black" size="2"> <b>ver Porcentajes</b> </font>  </a>  
            <a href=" {{route('Pnotas.edit',$evaluacion->materia_id)}}" class="btn btn-warning"> <font color="black" size="2"> <b>Editar</b> </font>  </a>  
            <a href=" {{route('Pnotas.destroy',$evaluacion->materia_id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><font color="black" size="2"> <b>Eliminar  </b>  </font></a>  
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>



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