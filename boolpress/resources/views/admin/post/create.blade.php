@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form enctype="multipart/form-data" class="" action="{{ route('admin.posts.store') }}" method="POST">
                @csrf
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleInputTitle" class="form-label">Title</label>
                    <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="title" name="title" placeholder="Write here your title">
                </div>
                @error('author')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="author" class="form-label">Author Name</label>
                    <input type="text" class="form-control" id="exampleAuthor" name="author" placeholder="write here author name">
                </div>

                 @error('type_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                {{-- @dd('$type->id') --}}
                <div class="mb-3">
                    <label for="type_id" class="form-label">
                        Category
                    </label>
                    <select class='form-select' name="type_id" id="type_id">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="image" class="form-label">Image link</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="upload here your image">
                </div>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" cols="20"  class="form-control" rows="15" placeholder="write here your content"></textarea>
                </div>
                
                <button  type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection
