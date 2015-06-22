@extends('site.home')
@section('sitecontent')
<!--this is the banner if this page has banner-->
 <?php echo eval(" ?>". $content . "<?php "); ?>
@stop
