@extends('app')

@section('content')
	<h1>Welcome to the Module Manager</h1>
	<h5>Manage module installation here.</h5>
	<h5>
		Modules Found: {{ $modules }}
	</h5>

	<!-- Display all installed modules in a table. -->
	<div>
	@if($modules > 0)
	<table id="installedModules">
		<tr>
			<td>
				Module Name
			</td>
			<td>
				Status				
			</td>
			<td>
				<!-- What do we put in here? -->
			</td>
		</tr>
		@foreach($data as $module)
		<tr>
			<td>
				{{ $module->module_name }}
			</td>
			<td>
				@if($module->enabled)
					<div class="moduleStatusIcon" style="color:#a2d10c">
						<b>O</b>
					</div>
				@elseif(!$module->enabled)
					<div class="moduleStatusIcon" style="color:#93131e">
						<b>X</b>
					</div>
				@endif
			</td>
			<td>
				@if($module->enabled)
					<button class="moduleToggle" value={{ $module->id }}>Disable</button>
				@elseif(!$module->enabled)
					<button class="moduleToggle" value={{ $module->id }}>Enable</button>
				@endif
			</td>
		</tr>
		@endforeach
	</table>
	@else
		No modules found. Please install a module from the module installation page or consult your administrator.
	@endif
	</div>
	<br></br>
	<button>IMPORT MODULES</button>

@stop

@section('footer')
	<script>
		//Event handler for toggle buttons in each row of the table.
		$(".moduleToggle").click(function(){
			//Update the icon within the table row to 'waiting'
			$(this).parent().parent().find(".moduleStatusIcon").html("8");
			//Change 'enabled' status of the selected module via AJAX.
			
		});
	</script>

@stop