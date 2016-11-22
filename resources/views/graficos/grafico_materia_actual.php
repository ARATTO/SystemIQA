@extends('template.main')

@section('title', 'Usuarios | Control')

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
            Usuarios
            <small> panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/users') }}"><i class="active fa fa-dashboard"></i>Usuarios</a></li>
        </ol>
    </section>


    <!-- contenido principal -->
    <section class="content"  id="contenido_principal">
        <!--BUSQUEDA-->


        Grafico Materia Actual





    </section>
</div>
</div>
@endsection


