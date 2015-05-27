@extends('modules.template')

@section('top')
	<div class='main-container__content__title'>
		<h2>Module Management</h2>
    </div>
    	    {!! Form::open(['url' => 'modules/upload', 'files' => TRUE, 'id' => 'upload-form']) !!}
		<div class="form-group">
			<input id="moduleUpload" type='button' value="Add New Module" class='btn btn-add'/>
			{!! Form::file('module', array('class' => 'upload-dialog', 'style' => 'visibility:hidden')) !!}
		</div>
		{!! Form::close() !!}
@stop

@section('body')
	@if( $message = Session::get('upload-message') )
		<div>{{ $message }}</div>
	@endif
	
	<!-- Output modules found. -->
	<div>
		Modules Installed: {{ $modules }}
	</div>

	<!-- Display all installed modules in a table. -->
	<div>
	@if($modules > 0)
	<table class="table table--module" id="installedModules">
		<tr>
			<td><div>
				Module Name
			</div></td>
			<td><div>
				Status				
			</div></td>
			<td><div>
				BUTTON				
			</div></td>
		</tr>
		@foreach($data as $module)
        <tr>
            <td> {{ $module->module_name }} </td>
			<td class="module-switch-container">
				<input type="checkbox" class="moduleToggle" 
			@if($module->enabled)
				checked >
			@elseif(!$module->enabled)
				 >										
			@endif
			</td>
			<td>
				<button type="button" data-switch-toggle="state" class="btn btn-default togglebutton">Toggle</button>
			</td>
        </tr>
		@endforeach
	</table>
	@else
		<h2>No modules found. Please install a module from the module installation page or consult your administrator.</h2>
	@endif
	</div>
	<br></br>
@stop

@section('scripts')
	<script>
        $(document).ready(function(){
        	//Initiate bootstrap-switch.js
    		$(".moduleToggle").bootstrapSwitch();
			$(".moduleToggle").bootstrapSwitch('wrapperClass', 'toggle-module');
			$(".module-switch-container").attr("style", "pointer-events:none");
        });

		// Event handler for toggle buttons in each row of the table.
		var callback = function(data){
				var decoded = jQuery.parseJSON(data);
				if(decoded >= 0) {
					//If statements
					if(decoded == 0) {
						// $(this).parent().parent().find(".moduleStatusIcon").html("OFF");
						// $(this).parent().parent().find(".moduleStatusIcon").attr("style", "color:#93131e");
						// $(this).removeAttr("currentState");
						$(this).removeAttr("checked");
						// $(this).html("Enable");	
					} else {
						// $(this).parent().parent().find(".moduleStatusIcon").html("ON");
						// $(this).parent().parent().find(".moduleStatusIcon").attr("style", "color:#a2d10c");
						// $(this).removeAttr("currentState");
						$(this).attr("checked", "TRUE");
						// $(this).html("Disable");
					}
					//Re-enable button
					$(this).removeAttr("disabled");	
				} else {
					//If statements
					// $(this).parent().parent().find(".moduleStatusIcon").html("!!!");
					// $(this).parent().parent().find(".moduleStatusIcon").attr("style", "color:#93131e");
					// $(this).parent().parent().find(".moduleToggle").attr("currentState", "ERROR");
					alert("An error has occurred. Please try again.");
				}
			};
		var updateModuleStatus = function() {
			//Disable button.
			$(this).attr("disabled", "disabled");
			//Get module ID.
			var moduleID = $(this).parent().parent().find(".moduleToggle").val();
			var status = $(this).parent().parent().find(".moduleToggle").attr("checked");
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
		// $(".moduleToggle").click(updateModuleStatus);
		// $(".bootstrap-switch").change( function a() {$(".toggle-module").bootstrapSwitch("toggleDisabled", "TRUE", "TRUE");});
        $("#moduleUpload").click(function a() {
          $(".upload-dialog").click();
        });
        $(".togglebutton").click( function a(){
        	var x = $(this).parent().parent().find(".moduleToggle");
        	x.bootstrapSwitch("toggleState");
        });


        //Autosubmit upload when adding a new module:
        var submitUpload = function() {
        	// alert("Submitting");
        	$("#upload-form").submit();
        };
        $(".upload-dialog").change( submitUpload );
	</script>
@stop