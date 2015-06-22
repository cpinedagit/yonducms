@extends('cms.home')
@section('title')
<h2>Edit Schedule</h2>
@stop
@section('content')
<div class='main-container__content__info'>
    {!! Form::model($schedules,array('method'=>'PUT','url'=>'cms/scheduler/'.$schedules->id,'files'=>'true'))!!}
    {!! Form::hidden('id',$schedules->id,['id' => 'scheduleBannerId']) !!}  
    <div role="tabpanel" class="tabpanel-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#details" aria-controls="home" role="tab" data-toggle="tab">Details</a></li>
            <li role="presentation"><a href="#scheduleBanner" aria-controls="messages" role="tab" data-toggle="tab">Edit Schedule Banner Image</a></li>
            <li role="presentation"><a href="#editMainBanner" aria-controls="profile" role="tab" data-toggle="tab">Edit Main Banner Images</a></li>
            <li role="presentation"><a href="#editMainBannerVideo" aria-controls="profile" role="tab" data-toggle="tab">Edit Main Banner Video Link</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="details">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="banner-title" class='form-title'>Edit Title</label>    
                            {!! Form::text('title',$schedules->title,['class' => 'form-control']) !!}
                        </div>                         
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="banner-title" class='form-title'>Edit Description</label>    
                            {!! Form::textarea('description',$schedules->descriptions,['class' => 'form-control']) !!}
                        </div>                         
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="banner-title" class='form-title'>Edit Time Schedule</label>   
                            {!! Form::input('time','schedule',$schedules->schedule,['class' => 'form-control','style'=>'width:120px;']) !!}
                        </div> 
				<div class="form-group">
				    <label for="banner-title" class='form-title'>Edit Day Schedule</label><br>  
				    {!! Form::label('','Monday:') !!}
				    {!! Form::checkbox('daySchedule','Monday',null,['id' => 'Monday']) !!}
				    {!! Form::label('','Tuesday:') !!}
				    {!! Form::checkbox('daySchedule','Tuesday',null,['id' => 'Tuesday']) !!}
				    {!! Form::label('','Wednesday:') !!}
				    {!! Form::checkbox('daySchedule','Wednesday',null,['id' => 'Wednesday']) !!}
				    {!! Form::label('','Thursday:') !!}
				    {!! Form::checkbox('daySchedule','Thursday',null,['id' => 'Thursday']) !!}
				    {!! Form::label('','Friday:') !!}
				    {!! Form::checkbox('daySchedule','Friday',null,['id' => 'Friday']) !!}
				    {!! Form::label('','Saturday:') !!}
				    {!! Form::checkbox('daySchedule','Saturday',null,['id' => 'Saturday']) !!}
				    {!! Form::label('','Sunday:') !!}
				    {!! Form::checkbox('daySchedule','Sunday',null,['id' => 'Sunday']) !!}
				</div>
			  </div>
		    </div>
		</div>
		<!--upload image for Schedule Banner-->
		<div role="tabpanel" class="tab-pane" id="scheduleBanner">
		    <div class="main-container__content__reminder">
			  <i class="fa fa-exclamation-circle"></i>
			  <small>File Type: JPG, GIF, PNG <br>
				Maximum File Size: 2MB <br>
				Recommended dimension: 1140 x 442
			  </small>
		    </div>
		    <div class="upload-image-container">                       
			  {!! Form::label('image','Current image') !!}<br>
			  {!! HTML::image('public/scheduleImages/'.$schedules->image,null,['width'=>'200px']) !!}<br><br>
			  <div class="upload-image-container__label">
				Click "<strong>Choose file</strong>" button to update image
			  </div>
			  {!! Form::file('scheduleImage',null) !!}
		    </div>
		</div>
		<!--edit Main Banner-->
		<div role="tabpanel" class="tab-pane" id="editMainBanner">
		    <div class="main-container__content__info__filter">
			  <label>
				<input type="checkbox" id='selecctall-banner'>
				Select All
			  </label>
			  <select name="" id="action" class="form-control">
				<option value="" disabled selected>Choose Action</option>
				<option value="Delete">Delete</option>
			  </select>
			  <input id='apply' type="button" class='btn btn-filter' value="Apply">
		    </div><br>
		    @include('cms.Schedules.photo_tool')
		    <ul class="list-unstyled banner-content-list">
			  @foreach($bannerImages as $bannerImage)
			  <li>
				@if($bannerImage->media_path != null)
				<input type="checkbox" name="checkbox" value ="{!! $bannerImage->id !!}">
				@endif
				<div class="banner-content-list__image-container">
				    @if($bannerImage->media_path != null)
				    {!! HTML::image($bannerImage->media_path) !!}
				    @else
				    NO IMAGE YET
				    @endif
				</div>
			  </li>
			  @endforeach
		    </ul>
		</div>
		<!--Edit Main Banner Video Link-->
		<div role="tabpanel" class="tab-pane" id="editMainBannerVideo">
		    <div class="main-container__content__reminder">
			  <i class="fa fa-exclamation-circle"></i>
			  <small>File Type: mp4<br>
				Maximum File Size: 1GB <br>
				Recommended dimension: 1140 x 442
			  </small>
		    </div>
		    <div class="upload-image-container">                       
			  {!! Form::label('image','Current video:') !!}<br>
			  @if($schedules->video != null)
			  <video width="400" controls>
				<source src="{!! URL::to('/') !!}/public/scheduleImages/{{ $schedules->video }}" type="video/mp4">
			  </video>
			  <div class="upload-image-container__label">
				Click "<strong>Choose file</strong>" button to update video
			  </div>
			  @else
			  <div class="alert alert-danger" role="alert">NO VIDEO AVAILABLE</div>  
			  @endif
			  {!! Form::file('mainBannerVideo',null) !!}
		    </div>
		</div>

	  </div>
	  <div class="btn-holder pull-left">
		{!! Form::submit('Save',['class' => 'btn btn-add']) !!}
		{!! Form::button('cancel',['id' => 'cancel', 'class' => 'btn btn-reset']) !!}
	  </div>
    </div>
    {!! Form::close() !!}
</div>
<footer class='footer footer--fixed'>
    <small class='copyright'>&copy; 2015 Yondu Website Service</small>
</footer>
<script>
    $(document).on('click', '#cancel', function () {
	  window.location = ("{!! URL::to('/') !!}/cms/scheduler");
    });

    $(document).on("click", '#apply', function () {
	  var action = $('#action').val();
	  if (action === 'Delete') {
		var checked = new Array();
		$("input:checkbox[name=checkbox]:checked").each(function () {
		    checked.push($(this).val());
		    console.log(checked);
		});
		if (confirm('do you really want to delete selected schedule banner image?') === true) {
		    $.ajax({
			  type: 'delete',
			  headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  },
			  data: {checked: checked},
			  url: "{!! URL::to('/') !!}" + '/cms/deleteScheduleBannerImage',
			  dataType: "json",
			  success: (function () {
				location.reload();
			  })
		    });
		} else {
		    return false;
		}
	  }
    });

    $(document).ready(function () {

	  //checks the checkbox
	  var scheduleId = {{ $scheduleId }};
		$.ajax({
		type: "get",
			  url: "{!! URL::to('/') !!}/cms/getAllDaySchedule/" + scheduleId,
			  success: function (day) {
				console.log(day);
				for (x in day[0]) {
					  if ($('#Monday').val() === day[0][x]['day']) {
						$('#Monday').prop('checked', true);
					  } else if ($('#Tuesday').val() === day[0][x]['day']) {
						$('#Tuesday').prop('checked', true);
					  } else if ($('#Wednesday').val() === day[0][x]['day']){
						$('#Wednesday').prop('checked',true);
					  } else if ($('#Thursday').val() === day[0][x]['day']){
						$('#Thursday').prop('checked',true);
					  } else if ($('#Friday').val() === day[0][x]['day']){
						$('#Friday').prop('checked',true);
					  } else if ($('#Saturday').val() === day[0][x]['day']){
						$('#Saturday').prop('checked',true);
					  }else if ($('#Sunday').val() === day[0][x]['day']){
						$('#Sunday').prop('checked',true);
					  }

				    }
			  }
		    })
		});



</script>

@stop



