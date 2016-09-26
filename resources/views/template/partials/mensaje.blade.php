@if (session()->has('flash_notification.message'))
        <div class="alert alert-{{ session('flash_notification.level') }}">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {!! session('flash_notification.message') !!}
        </div>
 @endif 
<!--
 @if (session()->has('flash_notification.message'))
    <script>
        swal({
            title: "{{ ucwords(Session::get('flash_notification.level')) }}",
            text:  "{{ Session::get('flash_notification.message') }}",
            type: "{{ Session::get('flash_notification.level') }}",
            timer: 4600,
            showConfirmButton: false
        });
    </script>
@endif	-->