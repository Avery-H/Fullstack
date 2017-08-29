@extends('layout.master')



@section('content')
	<h1>{{$yo}}</h1>
	<a href="{{action('HomeController@upperCase', array($yo))}}">click me for uppercase</a>
@stop