@extends('main')
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
		<td><img src="{{ $file->image_path  }}" style="height:100px;width:100px"/></td>
		<td>{{ $file->image_path }}</td>
		<td>{{ File::size($file->image_path) }} bytes </td>
		<td>{{ date('F d, Y', (File::lastModified($file->image_path))) }} </td>
		<td>{!! HTML::linkRoute('media.show', 'Edit',$file->image_id) !!}</td>
	</tr>
	@endforeach
	</tbody>
</table>

<div class="txtEditor">

</div>
@stop