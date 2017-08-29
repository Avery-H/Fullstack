@extends('layout.master')

@section('title')
	<title> Failed!</title>
@stop

@section('content')
<h1> Error 404! It is not safe to travel alone! take this!</h1>
<a href="{{ action('PostsController@index')}}">sword</a>
@stop