@extends('layout.master')

@section('title')
	<title> edit post! </title>
@stop

@section('content')

<main class="container">
        <h1>Edit a post here</h1>
        <form method="POST" action="{{ action('PostsController@update', $id) }}">
            {!! csrf_field() !!}
            {{ method_field('PUT') }}
            {!! $errors->first('title', '<span class="help-block">:message</span>')!!}
            <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="title">
            {!! $errors->first('content', '<span class="help-block">:message</span>')!!}
            <input type="text" name="content" id="content" value="{{ old('content') }}" placeholder="content">
            {!! $errors->first('url', '<span class="help-block">:message</span>')!!}
            <input type="text" name="url" id="url" value="{{ old('url') }}" placeholder="url">
            <button>Submit</button>
        </form>

        <form method="POST" action="{{ action('PostsController@destroy', $id)}}">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <button class="btn btn-warning">DELETE</button>
        </form>

    </main>

    @stop