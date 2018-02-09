
@extends('admin.template.main')

@section('title','Editar usuario' . $user->name )

@section('content')

{!! Form::open(['route'=>['users.update',$user], 'method' => 'PUT'])	!!}


<div class="form-group">
{!! Form::label('name','Nombre') !!}
{!! Form::text('name', $user->name, ['class'=>'form-control', 'placeholder' => 'Nombre completo', 'required' ]) !!}
</div>
      
  <div class="form-row">  
{!! Form::label('email','Correo Electronico') !!}
{!! Form::text('email',$user->email,['class' => 'form-control', 'placeholder' => 'example@gmailcom']) !!}
</div>


<div class="form-group">
{!! Form::label('type', 'Tipo') !!}
{!! Form::select('type', ['' => '.::Nivel::.' , 'member' => 'Miembro', 'admin' => 'Administrador'], null,[ 'class' =>'form-control']) !!}
</div>
        
<div class="form-group">
{!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
</div>


{!! Form::close()	!!}

@endsection


