@extends('template.main')

@section('title', 'Graficos | Control')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height:2000px !important;">
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
            <li><a href="{{ url('/') }}"><i class="active fa fa-dashboard"></i>Grafico</a></li>
        </ol>
    </section>

    <!-- contenido principal -->
    <section class="content"  id="contenido_principal">
        <!--BUSQUEDA-->
        <script type="text/javascript" src="{{ asset('jquery/jquery1.8.2.js') }}"></script>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- AREA CHART -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Grafico | Promedio en Curso</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">

                                <script type="text/javascript">
                                    $(function () {
                                        $('#container1').highcharts({
                                            title: {
                                                text: '{{$carrera}}',
                                                x: -20 //center
                                            },
                                            subtitle: {
                                                text: 'Materia: {{$materia}}',
                                                x: -20
                                            },
                                            xAxis: {
                                                categories: [
                                                    @foreach($Carnet as $C)
                                                        '{{$C}}' ,
                                                    @endforeach
                                                    ]
                                            },
                                            yAxis: {
                                                title: {
                                                    text: 'Promedio Actual'
                                                },
                                                plotLines: [{
                                                        value: 0,
                                                        width: 1,
                                                        color: '#808080'
                                                    }]
                                            },
                                            tooltip: {
                                                valueSuffix: '-'
                                            },
                                            legend: {
                                                layout: 'vertical',
                                                align: 'right',
                                                verticalAlign: 'middle',
                                                borderWidth: 0
                                            },
                                            series: [{
                                                    name: '',
                                                    data: [
                                                        @foreach($Datos as $D)
                                                        {{$D}} ,
                                                        @endforeach
                                                    ]
                                                }]
                                        });
                                    });
                                </script>
                                
                                <!-- Grafico-->
                                <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                <!-- FIN Grafico-->
                                
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->




    </section>
</div>
</div>
@endsection


