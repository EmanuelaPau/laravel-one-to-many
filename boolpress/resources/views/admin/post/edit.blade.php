@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form enctype="multipart/form-data" class="" action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleInputTitle" class="form-label">Title</label>
                    <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="title" name="title" placeholder="Write here your title" value="{{old('title', $post->title)}}">
                </div>
                @error('author')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="author" class="form-label">Author Name</label>
                    <input type="text" class="form-control" id="exampleAuthor" name="author" placeholder="write here author name" value="{{old('author', $post->author)}}">
                </div>
                <label for="type" class="form-label">Type</label>
                <select class="form-select mb-3" aria-label="Default select example">
                    @error('author')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <option selected>Select a type</option>
                    @foreach($types as $type) {
                        <option name="type" value="{{$type->id}}"> {{ old('type_id', $post->type_id) == $type->id ? '>' : '' }}
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="image" class="form-label">Image link</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="put here your image" value="{{old('image', '')}}">
                </div>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" cols="20"  class="form-control" rows="15" placeholder="write here your content" value="">{{old('content', $post->content)}}</textarea>
                </div>
                
                <button  type="submit" class="btn btn-primary">Update Post</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection
