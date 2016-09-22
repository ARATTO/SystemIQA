<!DOCTYPE html>
<html>
  <head>
    @include('template.partials.head')
    <link rel="shortcut icon" href="{{ asset('dist/img/systemiqa/eternoslimpio.jpg') }}">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Bienvenido</b><br>SystemIQA</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Ingrese al sistema</p>

        <form action="login" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

          <div class="form-group has-feedback">

                <input type="email" class="form-control" name="email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          @if (session()->has('flash_notification.message'))
          <div class="alert alert-{{ session('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! session('flash_notification.message') !!}
          </div>
          @endif
        



            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
            </div><!-- /.col -->
          </div>


        </form>




      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>


    <script>

      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>


  </body>
</html>
