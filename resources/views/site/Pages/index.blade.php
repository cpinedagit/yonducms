@extends('cms.home')
@section('content')

@stop

<!--this is the banner if this page has banner-->

{{ eval('?>'. $pages['content'])}}
