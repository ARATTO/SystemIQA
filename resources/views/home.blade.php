@extends('template.main')
@section('title', 'SYSTEMIQA')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height:2000px !important;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
            Escritorio<small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Dashboard</li>
        </ol>
      </section>
      
      
      <!-- contenido principal -->
      <section class="content"  id="contenido_principal">
      </section>

    
      <!-- cargador empresa -->
      <div style="display: none;" id="cargador_empresa" align="center">
          <br>
          <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>
          <img src="dist/img/cargando.gif" align="middle" alt="cargador"> &nbsp;
          <label style="color:#ABB6BA">Realizando tarea solicitada ...</label>
          <br>
              <hr style="color:#003" width="50%">
          <br>
      </div>
  </div><!-- /.content-wrapper -->
@endsection


