@extends('template')
@section('main-content')
<h1>Addpost</h1>
<div class="container my-5 p-4 shadow">
    <form action="{{route('storepost')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-2">
            <label for="title" class="form-label">Enter title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group mb-2">
            <label for="img" class="form-label">select img</label>
            <input type="file" name="img" class="form-control">
        </div>
        <input type="submit" value="Add Post" class="btn btn-sm bg-primary w-100">
    </form>
</div>
@endsection
