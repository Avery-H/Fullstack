@extends('layout.master')

@section('title')
	<title> display post! </title>
@stop

@section('content')
@if (!empty($posts))
    <h5>{{ $posts['title'] }}</h5>
    <h5>{{ $posts['url'] }}</h5>
    <h5>{{ $posts['content'] }}</h5>
    <h5>{{ $posts['created_at']}}</h5>
    <h5>{{ $posts['created_by']}}</h5>
    <a href="{{action('PostsController@edit',$posts->id)}}">edit</a>
@endif
@stop