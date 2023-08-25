@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center">
            <div class="card" style="width: 60%">
                <p class="card-text text-center mt-2">{{$post->id}}</p>
                @if(str_starts_with($post->image,'http'))
                    <img src="{{$post->image}}" class="card-img-top" alt="{{ $post->title }}">
                @else
                    <img src="{{asset('storage/' . $post->image)}}" class="card-img-top" alt="{{ $post->title }}.">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->content}}</p>
                    <p class="card-text">{{$post->author}}</p>
                    <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Go to List</a>
                    <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-success">Edit</a>
                    <a href="{{route('admin.posts.deleted', $post->id)}}" class="btn btn-warning">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
