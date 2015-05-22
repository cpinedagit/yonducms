@extends('cms.home')

@section('content')
	<div>Enable or disable module visibility.</div>

	@if(!is_null($message))
		<div>{{ $message }}</div>
	@endif
	
	<!-- Output modules found. -->
	<div>
		{{ $modules }} modules detected.
	</div>

	<!-- Display all installed modules in a table. -->
	<div>
	@if($modules > 0)
	<table id="installedModules">
		<tr>
			<td>
				Module Name

			</div></td>
			<td>
				Status				
			</div></td>
			<td>
				<!-- Empty column for the enable/disable buttons. -->
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
						<b>ON</b>
					</div>
				@elseif(!$module->enabled)
					<div class="moduleStatusIcon" style="color:#93131e">
						<b>OFF</b>
					</div>
				@endif
			</td>
			<td>
				@if($module->enabled)
					<button class="moduleToggle" value={{ $module->id }} currentState="enabled">Disable</button>
				@elseif(!$module->enabled)
					<button class="moduleToggle" value={{ $module->id }} currentState="disabled">Enable</button>
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

	<!-- Provide form thinger -->
	<h2>Upload Modules</h2>
	<div>Select a module file to upload and install.</div>
	<br/>
	{!! Form::open(['url' => 'modules/upload', 'files' => TRUE]) !!}
		<div class="form-group">
			{!! Form::file('module') !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Upload') !!}
		</div>
	{!! Form::close() !!}

	<script>
		//Event handler for toggle buttons in each row of the table.
		var callback = function(data){
				var decoded = jQuery.parseJSON(data);
				if(decoded >= 0) {
					//If statements
					if(decoded == 0) {
						$(this).parent().parent().find(".moduleStatusIcon").html("OFF");
						$(this).parent().parent().find(".moduleStatusIcon").attr("style", "color:#93131e");
						$(this).removeAttr("currentState");
						$(this).attr("currentState", "disabled");
						$(this).html("Enable");	
					} else {
						$(this).parent().parent().find(".moduleStatusIcon").html("ON");
						$(this).parent().parent().find(".moduleStatusIcon").attr("style", "color:#a2d10c");
						$(this).removeAttr("currentState");
						$(this).attr("currentState", "enabled");
						$(this).html("Disable");
					}
					//Re-enable button
					$(this).removeAttr("disabled");	
				} else {
					//If statements
					$(this).parent().parent().find(".moduleStatusIcon").html("!!!");
					$(this).parent().parent().find(".moduleStatusIcon").attr("style", "color:#93131e");
					$(this).parent().parent().find(".moduleToggle").attr("currentState", "ERROR");
					alert("An error has occurred. Please try again.");
				}
			};
		var updateModuleStatus = function() {
			//Update icon to waiting.
			$(this).parent().parent().find(".moduleStatusIcon").html("CHECKING");
			//Disable button.
			$(this).attr("disabled", "disabled");
			//Get module ID.
			var moduleID = $(this).parent().parent().find(".moduleToggle").val();
			var status = $(this).parent().parent().find(".moduleToggle").attr("status")
			var data = {'_token':$('[name=_token]').val(),'id':moduleID};
			var url = 	"{{ URL::route('togglemodule') }}";
			var proxiedCallback = jQuery.proxy(callback, this);
			$.ajax({
	            type: "POST",
	            url: url,
	            data: data,
				cache: false,
	            success: proxiedCallback
            });
		}
		$(".moduleToggle").click(updateModuleStatus);



	</script>


@stop