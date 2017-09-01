@extends('layout.master')

@section('title')
	<title> display post! </title>
@stop

@section('content')
@if (!empty($posts))
	@if($belong == true)
		@foreach($posts as $post)
    <h5>{{ $post['title'] }}</h5>
    <h5>{{ $post['url'] }}</h5>
    <h5>{{ $post['content'] }}</h5>
    <h5>{{ $post['created_at']}}</h5>
    @if($post['user_id'] == $user)
    	<a href="{{action('PostsController@edit', $post['id'])}}">edit</a>
    @endif
    @endforeach
   @else
   		<h5>{{ $posts['title'] }}</h5>
    	<h5>{{ $posts['url'] }}</h5>
    	<h5>{{ $posts['content'] }}</h5>
    	<h5>{{ $posts['created_at']}}</h5>
    	<h5>{{ $posts['user_id']}}</h5>
    	
	@endif
	@endif
@stop