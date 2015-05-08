@extends('cms.home')

@section('content')

	<h5>Roles</h5>

		<p>
			{!! HTML::linkRoute('cms.role.create', 'Create Role')!!}
		</p>

		<p>
			<h5>List of Roles</h5>
			@if( !count($roles) )
				<h5>No entries</h5>
			@else
				<ul>
				@foreach($roles as $role)
					<li>
						<table>
							<tr>
								<td>
								{!! $role->role_name !!}
								</td>
								<td>
								{!! HTML::linkRoute('cms.role.edit', 'edit', $role->id) !!}
								</td>
								<td>
								
									{!! Form::open(array('route' => array('cms.role.destroy', $role->id), 'method' => 'delete')) !!}
									    {!! Form::submit("Delete") !!}
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