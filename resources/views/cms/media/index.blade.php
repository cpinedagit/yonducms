@extends('cms.home')
@section('content')
<table class="superTable">
	<thead>
		<th>File</th>
		<th>File Name</th>
		<th>File Size</th>
		<th>File Date Created</th>
		<th>Action</th>
	</thead>
	<tbody>
	@foreach ($files as $file)
	<tr>
		<td>
			@if ($file->media_type == 1) 
			{!! HTML::image($file->media_path,'alt',array('height'=>100,'width'=>100)) !!}
			@else
			{!! HTML::image("css/video_icon.jpg",'alt',array('height'=>100,'width'=>100)) !!}
			@endif
		</td>
		<td>{{ after_last('/',$file->media_path) }}</td>
		<td>{{ File::size($file->media_path) }} bytes </td>
		<td>{{ date('F d, Y', (File::lastModified($file->media_path))) }} </td>
		<td>{!! HTML::linkRoute('cms.media.show', 'Edit',$file->media_id) !!}</td>
	</tr>
	@endforeach
	</tbody>
</table>

<div class="txtEditor">

</div>
@stop