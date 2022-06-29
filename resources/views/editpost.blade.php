@extends('template')
@section('main-content')
<h1>Edit Post</h1>
<div class="container my-5 p-4 shadow">
    <form action="{{route('updatepost')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{($post->id)}}" name="postid">
        <div class="form-group mb-2">
            <label for="title" class="form-label">Update title</label>
            <input type="text" name="title" value="{{$post->title}}" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label for="img" class="form-label">Current img</label>
            <img height="50px" src="{{asset($post->img_url)}}" alt="">
        </div>

        <div class="form-group mb-2">
            <label for="img" class="form-label">select img</label>
            <input type="file" name="img" class="form-control">
        </div>
        <input type="submit" value="Add Post" class="btn btn-sm bg-primary w-100">
    </form>
</div>
@endsection
