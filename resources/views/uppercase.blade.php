@extends('layout.master')



@section('content')
	<h1>{{$hey}}</h1>
	<a href="{{action('HomeController@lowerCase', array($hey))}}">click me for lowercase</a>
@stop