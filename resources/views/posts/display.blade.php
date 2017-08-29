@extends('layout.master')

@section('title')
	<title> display post! </title>
@stop

@section('content')
@if (!empty($posts))
@foreach ($posts as $post)
    <h5>{{ $post->title }}</h5>
    <h5>{{ $post->url }}</h5>
    <h5>{{ $post->content }}</h5>
    <h5>{{ $post->created_at->diffForHumans()}}</h5>
    <h5>{{ $post->created_by}}</h5>
    <a href="{{action('PostsController@show',$post->id)}}"> go to </a>
@endforeach
@endif
{!! $posts->render() !!}
@stop