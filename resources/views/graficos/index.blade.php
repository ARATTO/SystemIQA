@extends('template.main')

@section('title', 'Graficos | Control')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height:20000px !important;">
    @if (session()->has('flash_notification.message'))
    <div class="alert alert-{{ session('flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('flash_notification.message') !!}
    </div>
    @endif

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Graficos
            <small> panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="active fa fa-dashboard"></i>Graficos</a></li>
        </ol>
    </section>





    <!-- contenido principal -->
    <section class="content"  id="contenido_principal">

        <section class="row-border">

            <div class="form-group ">
                {!! Form::open(['action'=>'GraficosController@PorMateriaCiclos']) !!}
                <div id="panel" class="panel panel-primary col-lg-5">
                    <div class="panel-heading ">
                        <div>
                            <h3>Grafico Materia Ciclos</h3>
                        </div>
                    </div>

                    @include('flash::message')

                    <div class="panel-body">
                        <div>
                            {!! form::label('nombre', 'Carrera') !!}
                            {!! form::select('id', $carrera, null, ['class' => 'form-control', 'name'=>'CarreraElejida', 'id'=>'CarreraElejida', 'placeholder'=>'Seleccione una carrera' , 'required']) !!}  
                        </div>
                        <hr>
                        <div id="2" class="form-grup" style="display:none">
                            {!! form::label('nombre', 'Materia Alimentos') !!}
                            <select name="materiasAlimentos" id="materiasAlimentos" class="form-control selectpicker">
                                @foreach($materias as $materia)
                                @foreach ($materia->carreras as $v)
                                @if($v->id == 1)
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
                                @if($v->id == 2)
                                <option  id="valor" value= {{$materia->id}} > {{$materia->nombre}} </option>
                                @endif  
                                @endforeach
                                @endforeach
                            </select>
                        </div>     

                    </div>

                    <div class="form-group">
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                {!! form::submit('GRAFICAR', ['class'=> 'btn btn-danger btn-lg']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div><!-- /.content-wrapper -->



                <div class="col-md-1"></div>
                <!-- /////////////////// -->


                <div class="form-group ">
                    {!! Form::open(['action'=>'GraficosController@PorMateriaActual']) !!}
                    <div id="panel" class="panel panel-primary col-lg-5">
                        <div class="panel-heading ">
                            <div>
                                <h3>Grafico Materia Actual</h3>
                            </div>
                        </div>

                        @include('flash::message')

                        <div class="panel-body">
                            <div>
                                {!! form::label('nombre', 'Carrera') !!}
                                {!! form::select('id', $carrera, null, ['class' => 'form-control', 'name'=>'CarreraElejidaActual', 'id'=>'CarreraElejidaActual', 'placeholder'=>'Seleccione una carrera' , 'required']) !!}  
                            </div>
                            <hr>
                            <div id="6" class="form-grup" style="display:none">
                                {!! form::label('nombre', 'Materia Alimentos') !!}
                                <select name="materiasAlimentos" id="materiasAlimentos" class="form-control selectpicker">
                                    @foreach($materias as $materia)
                                    @foreach ($materia->carreras as $va)
                                    @if($va->id == 1)
                                    <option id="hola" value= {{$materia->id}} > {{$materia->nombre}} </option>
                                    @endif  
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <div id="5" class="form-grup" style="display:none">
                                {!! form::label('nombre', 'Materia Quimica') !!}
                                <select name="materiasQuimica" id="materiasQuimica" class="form-control selectpicker">
                                    @foreach($materias as $materia)
                                    @foreach ($materia->carreras as $va)
                                    @if($va->id == 2)
                                    <option  id="valor" value= {{$materia->id}} > {{$materia->nombre}} </option>
                                    @endif  
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>

                        </div>



                        <div class="form-group">
                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                <div class="btn-group" role="group">
                                    {!! form::submit('GRAFICAR', ['class'=> 'btn btn-danger btn-lg']) !!}
                                </div>
                            </div>
                        </div>



                        {!! Form::close() !!}

                    </div><!-- /.content-wrapper -->

                    </section>

                    <section class="row-border">

                        <div class="form-group ">
                            {!! Form::open(['action'=>'GraficosController@GlobalPera']) !!}
                            <div id="panel" class="panel panel-primary col-lg-11">
                                <div class="panel-heading ">
                                    <div>
                                        <h3>Grafico Global PERA</h3>
                                    </div>
                                </div>

                                @include('flash::message')

                                <div class="panel-body">
                                    <div>
                                        {!! form::label('nombre', 'Carrera') !!}
                                        {!! form::select('id', $carrera, null, ['class' => 'form-control', 'name'=>'CarreraElejidaGlobal', 'id'=>'CarreraElejidaGlobal', 'placeholder'=>'Seleccione una carrera' , 'required']) !!}  
                                    </div>
                                    <hr>
                                    <div id="4" class="form-grup" style="display:none">
                                        {!! form::label('nombre', 'Materia Alimentos') !!}
                                        <select name="materiasAlimentos" id="materiasAlimentos" class="form-control selectpicker">
                                            @foreach($materias as $materia)
                                            @foreach ($materia->carreras as $vb)
                                            @if($vb->id == 1)
                                            <option id="hola" value= {{$materia->id}} > {{$materia->nombre}} </option>
                                            @endif  
                                            @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <hr>
                                    <div id="3" class="form-grup" style="display:none">
                                        {!! form::label('nombre', 'Materia Quimica') !!}
                                        <select name="materiasQuimica" id="materiasQuimica" class="form-control selectpicker">
                                            @foreach($materias as $materia)
                                            @foreach ($materia->carreras as $vb)
                                            @if($vb->id == 2)
                                            <option  id="valor" value= {{$materia->id}} > {{$materia->nombre}} </option>
                                            @endif  
                                            @endforeach
                                            @endforeach
                                        </select>
                                    </div>

                                </div>



                                <div class="form-group">
                                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                        <div class="btn-group" role="group">
                                            {!! form::submit('GRAFICAR', ['class'=> 'btn btn-danger btn-lg']) !!}
                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}

                            </div><!-- /.content-wrapper -->

                            
        </section>
        
        
        
        

</section>





                    @endsection

                    @section('js')
                    <script type="text/javascript">

                        function cambio() {

                            return document.getElementById('CarreraElejidaGlobal').value;
                        }


                        $("#CarreraElejidaGlobal").change(
                                function () {
                                    // alert( document.getElementById('CarreraElejida').value );

                                    if (document.getElementById('CarreraElejidaGlobal').value == 2) {
                                        document.getElementById(3).style.display = 'block';
                                        document.getElementById(4).style.display = 'none';
                                    } else {
                                        document.getElementById(3).style.display = 'none';
                                        document.getElementById(4).style.display = 'block';
                                    }


                                }

                        );

                    </script>
                    <script type="text/javascript">

                        function cambio() {

                            return document.getElementById('CarreraElejida').value;
                        }


                        $("#CarreraElejida").change(
                                function () {
                                    // alert( document.getElementById('CarreraElejida').value );

                                    if (document.getElementById('CarreraElejida').value == 2) {
                                        document.getElementById(1).style.display = 'block';
                                        document.getElementById(2).style.display = 'none';
                                    } else {
                                        document.getElementById(1).style.display = 'none';
                                        document.getElementById(2).style.display = 'block';
                                    }


                                }

                        );

                    </script>
                    
                    <script type="text/javascript">

                        function cambio() {

                            return document.getElementById('CarreraElejidaActual').value;
                        }


                        $("#CarreraElejidaActual").change(
                                function () {
                                     //alert( document.getElementById('CarreraElejidaActual').value );

                                    if (document.getElementById('CarreraElejidaActual').value == 2) {
                                        document.getElementById(5).style.display = 'block';
                                        document.getElementById(6).style.display = 'none';
                                    } else {
                                        document.getElementById(5).style.display = 'none';
                                        document.getElementById(6).style.display = 'block';
                                    }


                                }

                        );

                    </script>
                    
                    
                    @endsection('js')

