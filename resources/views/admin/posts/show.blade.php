@extends('layouts.admin')

@section('content')
    <img src="{{$post->cover_image}}" alt="{{$post->title}}">
    <h1>{{$post->title}}</h1>
    <div class="content">
        {{$post->content}}
    </div>
    <div class="metadata">
        Category: {{$post->category ? $post->category->name : 'Not assigned'}}
    </div>
@stop