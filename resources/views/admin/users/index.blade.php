@extends('admin.template.main')

@section('title','Lista de usuarios')

@section('content')
	<a href="{{ route('users.create') }}" class="btn btn-info">Registrar usuario</a>
	<table class='table table-striped'>
		<thead>
			<th></th>
			<th>Nombre</th>
			<th>Correo<span class="glyphicon glyphicon-envelope"></span></th>
			<th><span class="glyphicon glyphicon-user">Tipo</th>
			<th>Accion</th>
		</thead>
		<tbody>
		@foreach($users as $user)
			<tr>
				<td><span class="glyphicon glyphicon-user"></span></td>
				<td>{{ $user->name}}</td>
				<td>{{ $user->email}}</td>
				<td>
					@if($user->type == "admin")
						<span class="label label-danger">{{$user->type}}</span>
					@else
						<span class="label label-primary">{{$user->type}}</span>
					@endif
				</td>
				<td>
					<a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('Seguro que deseas eliminar el usuario'.$user->name.'?')" class="label label-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
					<a href="{{ route('users.edit', $user->id) }}" class="label label-warning"><span class="glyphicon glyphicon-wrench"></span></a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
		{{ $users->links() }}
@endsection