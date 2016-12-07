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
            <li><a href="{{ url('/graficos') }}"><i class="active fa fa-dashboard"></i>Grafico</a></li>
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
                            <h3 class="box-title">Grafico | PERA Global</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">

                                <script type="text/javascript">
                                    $(function () {

                                        // Radialize the colors
                                        Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                                            return {
                                                radialGradient: {
                                                    cx: 0.5,
                                                    cy: 0.3,
                                                    r: 0.7
                                                },
                                                stops: [
                                                    [0, color],
                                                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                                                ]
                                            };
                                        });

                                        // Build the chart
                                        $('#container').highcharts({
                                            chart: {
                                                plotBackgroundColor: null,
                                                plotBorderWidth: null,
                                                plotShadow: false,
                                                type: 'pie'
                                            },
                                            title: {
                                                text: 'Resultados | PERA'
                                            },
                                            tooltip: {
                                                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                            },
                                            plotOptions: {
                                                pie: {
                                                    allowPointSelect: true,
                                                    cursor: 'pointer',
                                                    dataLabels: {
                                                        enabled: true,
                                                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                                        style: {
                                                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                        },
                                                        connectorColor: 'silver'
                                                    }
                                                }
                                            },
                                            series: [{
                                                name: 'Estado:',
                                                data: [
                                                    { name: 'APROBADO', y: {{ $APROBADO }} },
                                                    {
                                                        name: 'PERA',
                                                        y: {{$PERA}},
                                                        sliced: true,
                                                        selected: true
                                                    }
                                                    
                                                ]
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
</div>
@endsection


