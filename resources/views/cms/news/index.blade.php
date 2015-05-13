@extends('main')
@section('content')
<table class="superTable">
	<thead>
		<th>News Date</th>
		<th>News Title</th>
		<th>Published</th>
		<th>Featured</th>
		<th>Action</th>
	</thead>
	<tbody>
	@foreach ($results as $result)
	<tr>
		<td>{{ $result->news_date }}</td>
		<td>{{ $result->news_title }}</td>
		<td>
			@if ($result->published == 1)
				<span class="glyphicon glyphicon-ok"></span>
			@else
				<span class="glyphicon glyphicon-remove"></span>
			@endif
		</td>
		<td>
			@if ($result->featured == 1)
				<span class="glyphicon glyphicon-ok"></span>
			@else
				<span class="glyphicon glyphicon-remove"></span>
			@endif
		</td>
		<td>{!! HTML::linkRoute('news.show', 'Edit',$result->news_id) !!}</td>
	</tr>
	@endforeach
	</tbody>
</table>
@stop