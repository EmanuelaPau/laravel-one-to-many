@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->author}}</td>
                        <td>
                            <form class="d-inline" action="{{route('admin.posts.restore', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" href="" class="btn btn-warning btn-sm">Restore</button>
                            </form>
                            <form class="d-inline" action="{{route('admin.posts.obliterate', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" href="" class="btn btn-danger btn-sm">Permanent Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection