
@extends('admin.template.main')

@section('title','Crear usuario')

@section('content')

{!! Form::open(['route'=>'users.store', 'method' => 'POST'])	!!}


<div class="form-group">
{!! Form::label('name','Nombre') !!}
{!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Nombre completo', 'required' ]) !!}
</div>
      
  <div class="form-row">  
<div class="form-group col-md-6">
{!! Form::label('email','Correo Electronico') !!}
{!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'example@gmailcom']) !!}
</div>

<div class="form-group col-md-6">
{!! Form::label('contraseña','Contrasena') !!}
{!! Form::password('password',['class' => 'form-control', 'placeholder'=>'*************', 'required' ]) !!}
</div>

</div>

<div class="form-group">
{!! Form::label('type', 'Tipo') !!}
{!! Form::select('type', ['' => '.::Nivel::.' , 'member' => 'Miembro', 'admin' => 'Administrador'], null,[ 'class' =>'form-control']) !!}
</div>
        
<div class="form-group">
{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
</div>


{!! Form::close()	!!}

@endsection


