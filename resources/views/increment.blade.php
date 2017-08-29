@extends('layout.master')



@section('content')
	<h1>{{$numb}}</h1>
	<a href="{{action('HomeController@increment', array($numb))}}">click me to increment</a>
@stop