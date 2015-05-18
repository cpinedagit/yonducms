@extends('cms.home')

@section('content')

	<p>
		{!! HTML::image('public/images/profile/' . \Auth()->user()->profile_pic, \Auth()->user()->username) !!}
	</p>

	<p>
		
	</p>
	
@stop