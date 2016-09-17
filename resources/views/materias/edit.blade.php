	<div id="contenedor_formulario" class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">@yield('title_panel','Modificar Asignatura')</h3>
      </div>
        @include('flash::message')
      <div class="panel-body">

        @section('title', 'Control')

        {!! Form::open(['route' => ['materias.materias.update',$mat->id],'method'=>'PUT'])!!}
        <div class="form-group">
          {!! Form::label('codigo','Código') !!}
          {!! Form::text('codigo', $mat->codigo,['class'=>'form-control','placeholder'=>'QUR-115','required'])!!}
        </div>
        <div class="form-group">
          {!! Form::label('nombre','Nombre') !!}
          {!! Form::text('nombre',$mat->nombre,['class'=>'form-control','placeholder'=>'Química General II','required'])!!}  
        </div>
        <div class="form-group">
          {!! Form::label('codigo','Carreras Universitaria: ') !!} &nbsp;&nbsp;&nbsp;
          {!! Form::select('ids[]',$carreras,$mat_carreras,['class'=>'form-control select-carrera','multiple','required']) !!}
          </div>
        <div class="form-group">
          {!! Form::label('unidades_valorativas','Unidades Valorativas') !!}
          {!! Form::number('unidades_valorativas',$mat->unidades_valorativas,['class'=>'form-control','min'=>1,'max'=>10,'required']) !!}
        </div>
        

        <div class="form-group">
          {!! Form::label('matricula','Numero de Matricula') !!}
         {!! Form::number('matricula',$mat->numero_retiros,['class'=>'form-control','min'=>0,'max'=>10000,'required']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('numero_retiros','Numero de retiros') !!}
          {!! Form::number('numero_retiros',$mat->numero_retiros,['class'=>'form-control','min'=>0,'max'=>10000,'required']) !!}
        </div>
        
        
        <div class="form-group">
          {!! Form::submit('Modificar',['class'=>'btn btn-primary' ]) !!}
        </div>

        {!! Form::close()!!}
      </div>
      <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
      <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
      <script>

      $(document).ready(function(){
        document.title.attr
        document.title="Editar Asignatura ";

      });

      $(".select-carrera").chosen({
        placeholder_text_multiple: ' Seleccione las carreras en las que se imparte esta asignatura',
        no_results_text:' No se encontraron carreras'
      });
      </script>
</div>