@extends('main')

@section('content')

	<h5>Create New Role Access</h5>

	{!! Form::open(array('route' => array('roleaccess.store'), 'method' => 'post')) !!}

		<p>
			{!! Form::label('role_name', 'Role') !!}
			<select name='role'>
				@foreach($data->roles as $role)
					<option value={!! $role->id !!}> {!! $role->role_name !!} </option>
				@endforeach
			</select>
		</p>

		<p>
			<table class="table">
				<thead>
					<tr>
						<td>Modules</td>
						<td>Add</td>
						<td>Edit</td>
						<td>Delete</td>
						<td>View</td>
					</tr>
				</thead>
				<tbody>
					@foreach($data->modules as $module)
						<tr>
							<td>
								{!! $module->module_name !!}
							</td>
							<td>
								{!! Form::checkbox('add' . $module->id) !!}
							</td>
							<td>
								{!! Form::checkbox('edit' . $module->id) !!}
							</td>
							<td>
								{!! Form::checkbox('delete' . $module->id) !!}
							</td>
							<td>
								{!! Form::checkbox('isactive' . $module->id) !!}
							</td>
						</tr>
					@endforeach
					<tr>
					</tr>
				</tbody>
			</table>
		</p>

		<p>
			{!! Form::submit('Submit') !!}
		</p>

	{!! Form::close() !!}

	@if($errors->any())

		@foreach($errors->all() as $error)
			<li>{!! $error !!}</li>
		@endforeach

	@endif

@stop