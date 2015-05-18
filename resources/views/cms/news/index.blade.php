@extends('cms.home')
@section('content')
<style>
.btn-delete{
	background-color: Transparent;
	background-repeat:no-repeat;
	border: none;
	cursor:pointer;
	overflow: hidden;
	outline:none;
	color: #7b8698;
	transition: all 0.3s ease-in-out;
}
</style>
<div class='main-container__content__info'>
	<div class="main-container__content__info__summary">
		<span>
			<strong>All</strong> ({{$all}})
		</span>
		<span>
			<strong>Published</strong> ({{ $published[0]->c_pub }})
		</span>
		<span>
			<strong>Featured</strong> ({{ $featured[0]->c_fea }})
		</span>
	</div>

	<div class="main-container__content__info__filter-container">
		<div class="main-container__content__info__filter2">
			<select name="" id="" class="form-control">
				<option value="" disabled selected>Choose Action</option>
				<option value="">Delete</option>
			</select>
			<input type="submit" class='btn btn-filter' value="Apply">
		</div>
		<div class="main-container__content__info__search">
			<div class="form-inline">
				<select name="" id="" class="form-control main-container__content__info__search__dropdown">
					<option value="title">Title</option>
					<option value="date">Date Created</option>
					<option value="status">Status</option>
				</select>
				<input type="text" class="form-control  main-container__content__info__search__option" placeholder="Title" id='title'>

				<span id="date" class='date-container main-container__content__info__search__option noshow'>
					<div class="form-group">
						<label for="from">From: </label>
						<input type="text" class="form-control datepicker" id="from">
					</div>
					<div class="form-group">
						<label for="to">To: </label>
						<input type="email" class="form-control datepicker" id="to">
					</div>
				</span>

				<select name="" id="status" class="form-control main-container__content__info__search__option noshow">
					<option value="">Published</option>
					<option value="">Unpublished</option>
				</select>

				<input type="submit" class='btn btn-filter' value="Search">
			</div>
		</div>
	</div>

	<table class="superTable table table-striped table--data table--lastaction">
		<thead>
			<tr>
				<th><input type="checkbox" id='selecctall'></th>
				<th>News Date</th>
				<th>News Title</th>
				<th>Published</th>
				<th>Featured</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($results as $result)
			<tr>
				<td><input type="checkbox"></td>
				<td>{{ $result->news_date }}</td>
				<td>{{ $result->news_title }}</td>
				<td>
					@if ($result->published == 1)
					Yes
					@else
					No
					@endif
				</td>
				<td>
					@if ($result->featured == 1)
					Yes
					@else
					No
					@endif
				</td>
				<td class='action'>
					<i class="fa fa-chevron-left"></i>
					<ul class="list-unstyled action-list">
						<li>{!! HTML::linkRoute('cms.news.show', 'Edit',$result->news_id) !!}</li>
						<li>{!! Form::open(array('route'=>array('cms.news.destroy', $result->news_id),'method'=>'DELETE')) !!}
							{!! Form::submit('Delete', array('class' => 'btn-delete')) !!}
							{!! Form::close() !!}</li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@stop