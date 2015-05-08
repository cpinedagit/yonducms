@extends('cms.home')

@section('content')

	<h5>Users</h5>

		<p>
			{!! HTML::linkRoute('cms.user.create', 'Create User')!!}
		</p>

		<p>
			<h5>List of Users</h5>
			@if( !count($users) )
				<h5>No entries</h5>
			@else
				<ul>
				@foreach($users as $user)
					<li>
						<table>
							<tr>
								<td>
								{!! $user->username !!}
								</td>
								<td>
								{!! HTML::linkRoute('cms.user.edit', 'edit', $user->username) !!}
								</td>
								<td>
								
									{!! Form::open(array('route' => array('cms.user.destroy', $user->id), 'method' => 'delete')) !!}
									    {!! Form::submit("Delete", array('class' => 't2tButton text-center')) !!}
									{!! Form::close() !!}

								</td>
							</tr>
						</table>
					</li>					
				@endforeach
				</ul>
			@endif
		</p>

@stop