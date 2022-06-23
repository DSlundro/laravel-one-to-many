@extends('layouts.admin')

@section('content')

<h2>Edit {{$post->title}}</h2>



<form action="{{route('admin.posts.update', $post->slug)}}" method="post">
    @csrf
    @method('PUT')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Learn php article" aria-describedby="titleHelper" value="{{$post->title}}">
        <small id="titleHelper" class="text-muted">Type the post title, max: 150 </small>
    </div>

    <div class="mb-3">
        <label for="cover_image" class="form-label">Cover Image</label>
        <input type="text" name="cover_image" id="cover_image" class="form-control" placeholder="Learn php article" aria-describedby="cover_imageHelper" value="{{$post->cover_image}}">
        <small id="cover_imageHelper" class="text-muted">Url image</small>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Categories</label>
        <select name="category_id" id="category_id">
            <option value="">Select a category</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}" {{$post->category_id == old('category_id', $category->id) ? 'selected' : ''}} >{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="content" rows="3">{{$post->content}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection
