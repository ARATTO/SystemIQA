

{!! Form::open(['route' => 'admin.tutor.store', 'method' => 'POST']) !!}

  <div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nombres', 'required']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('name', 'Apellido') !!}
    {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Apellidos', 'required']) !!}
  </div>

   <div class="form-group">
    {!! Form::label('name', 'Telefono') !!}
    {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Numero de telefono', 'required']) !!}
  </div>

  <div class = "form_group">
    {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
  </div>

  {!! Form::close() !!}



