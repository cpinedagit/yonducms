@extends('main')

@section('content')

	<h5>Users</h5>

		<p>
			{!! HTML::linkRoute('user.create', 'Create User')!!}
		</p>

		<p>
			<h5>List of Users</h5>
			@if( !count($users) )
				<h5>No entries</h5>
			@else
				<ul>
				@foreach($users as $user)
					<li>{!! HTML::linkRoute('user.edit', $user->username, $user->username) !!}</li>					
				@endforeach
				</ul>
			@endif
		</p>

@stop