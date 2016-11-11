
<script type="text/javascript" src="{{ asset('jquery/jquery1.8.2.js') }}"></script>
<script src=" {{ asset('plugins/bootstrap/js/bootstrap.js') }}" ></script>

<!-- jQuery 2.1.4 -->

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>  $("#content-wrapper").css("min-height","2000px"); </script>

<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->

<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/app.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

<!-- javascript del sistema laravel -->


<script src="dist/js/sistemalaravel.js"></script>
<script src="{{ asset('js/sistemalaravel.js') }}"></script>

<script src="{{ asset('code.jquery.com/jquery.js') }}"></script>
<script src="{{ asset('maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') }}"></script>


<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
<!-- script de materias  **Elias -->
<script src="{{ asset('dist/js/materias.js') }}"></script>
<!-- script de mensajes de confirmacion **Elias -->
<script src="{{ asset('dist/js/bootbox.js') }}"></script>
<!-- script de time picker **Elias -->



 <script>
    $('#flash-overlay-modal').modal();
</script>


<script type="text/javascript">
	function alerta($texto) {
		alert($texto);
	}
</script>

<!-- javascript de formularios de elias -->
 <script>

$('#codigo-mat').change(function(){     
        if($('#codigo-mat').val()){

        	

       $url= "{{route('materias.index')}}"+"/filtrar/"+$("#codigo-mat").val();  
       		window.location.href=$url;//."/filtrar/".$url;
          }else{
          window.location.href="{{route('materias.index')}}";
          }
        });


 </script>

<!--  FIN javascript de formularios de elias -->

<script src="{{ asset('highcharts/code/highcharts.js') }}"></script>
<script src="{{ asset('highcharts/code/modules/exporting.js') }}"></script>

<script src="{{ asset('highstock/code/highstock.js') }}"></script>
<script src="{{ asset('highstock/code/modules/exporting.js') }}"></script>
