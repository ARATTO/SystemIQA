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
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- AREA CHART -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Area Chart</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">

                                <script type="text/javascript" src="{{ asset('jquery/jquery1.8.2.js') }}"></script>

                                <script type="text/javascript">
                                    $(function () {
                                        $('#container').highcharts({
                                            title: {
                                                text: 'Monthly Average Temperature',
                                                x: -20 //center
                                            },
                                            subtitle: {
                                                text: 'Source: WorldClimate.com',
                                                x: -20
                                            },
                                            xAxis: {
                                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                                            },
                                            yAxis: {
                                                title: {
                                                    text: 'Temperature (°C)'
                                                },
                                                plotLines: [{
                                                        value: 0,
                                                        width: 1,
                                                        color: '#808080'
                                                    }]
                                            },
                                            tooltip: {
                                                valueSuffix: '°C'
                                            },
                                            legend: {
                                                layout: 'vertical',
                                                align: 'right',
                                                verticalAlign: 'middle',
                                                borderWidth: 0
                                            },
                                            series: [{
                                                    name: 'Tokyo',
                                                    data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                                                }, {
                                                    name: 'New York',
                                                    data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                                                }, {
                                                    name: 'Berlin',
                                                    data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                                                }, {
                                                    name: 'London',
                                                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                                                }]
                                        });
                                    });
                                </script>
                                
                                <!-- Grafico-->
                                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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
<!-- /.content-wrapper -->

@endsection
