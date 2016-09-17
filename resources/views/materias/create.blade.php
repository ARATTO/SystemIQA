<div id="contenedor_formulario" class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">@yield('title_panel','Nueva Asignatura')</h3>
      </div>
        @include('flash::message')
      <div class="panel-body">

        @section('title', 'Control')

        {!! Form::open(['route' => 'materias.materias.store','method'=>'POST'])!!}
        <div class="form-group">
          {!! Form::label('codigo','Código') !!}
          {!! Form::text('codigo',null,['class'=>'form-control','placeholder'=>'QUR-115','required'])!!}
        </div>
        <div class="form-group">
          {!! Form::label('nombre','Nombre') !!}
          {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Química General II','required'])!!}  
        </div>
         <div class="form-group">
          {!! Form::label('codigo','Carreras Universitaria: ') !!} &nbsp;&nbsp;&nbsp;
          {!! Form::select('ids[]',$carreras,null,['class'=>'form-control select-carrera','multiple','required']) !!}


        </div>

        <div class="form-group">
          {!! Form::label('unidades_valorativas','Unidades Valorativas') !!}
          {!! Form::number('unidades_valorativas',4,['class'=>'form-control','min'=>1,'max'=>10,'required']) !!}
        </div>
        

        <div class="form-group">
          {!! Form::label('matricula','Numero de Matricula') !!}
         {!! Form::number('matricula',0,['class'=>'form-control','min'=>0,'max'=>10000,'required']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('numero_retiros','Numero de retiros') !!}
          {!! Form::number('numero_retiros',0,['class'=>'form-control','min'=>0,'max'=>10000,'required']) !!}
        </div>
        
        
        <div class="form-group">
          {!! Form::submit('Registrar',['class'=>'btn btn-primary' ]) !!}
        </div>

        {!! Form::close()!!}
      </div>
      <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
      <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
      <script>

      $(document).ready(function(){
        document.title.attr
        document.title="Nueva Asignatura ";

      });


      $(".select-carrera").chosen({
        placeholder_text_multiple: ' Seleccione las carreras en las que se imparte esta asignatura',
        no_results_text:' No se encontraron carreras'
      });
      </script>
</div>