@extends('site.home')
@section('sitecontent')
<!--this is the banner if this page has banner-->
<h1>{!!$pages->title !!}</h1>
 <?php echo eval(" ?>". $content . "<?php "); ?>
@stop
