@extends('cms.main')

 @section('content')
  <h5> Hello {{ \Auth::user()->username }} </h5>
  <a href="{{ URL('/auth/logout') }}">Log-out</a>
 @stop 
