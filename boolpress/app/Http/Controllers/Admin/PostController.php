<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post as Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::paginate(15);
        // @dd($posts);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.post.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {

        $data = $request->validate(
            [
                'title' => ['required', 'unique:posts', 'max:255'],
                'author' => ['required', 'max:255'],
                'content' => ['required', ''],
                'image' => ['file'],
            ]

        );
        $data['slug'] = Str::of($data['title'])->slug('-');
        if ($request->hasFile('image')) {
            $img_path = \Storage::put('uploads/posts', $request['image']);
            $data['image'] = $img_path;
        }
        $newPost = new Post;
        $newPost = Post::create($data);
        return redirect()->route('admin.posts.show', $newPost);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // $post = Post::findOrFail($id);
        return view('admin.post.edit', compact('post'));

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        // dd($request->all());
        $data = $request->validate(
            [
                'title' => ['required', 'max:255', Rule::unique('posts')->ignore($post->id)],
                'author' => ['required', 'max:255'],
                'content' => ['required', ''],
                'image' => ['files'],
            ]

        );
        $img_path = \Storage::put('uploads/posts', $request['image']);
        $data['image'] = $img_path;
        $data['slug'] = Str::of($data['title'])->slug('-');
        $post->update($data);

        return redirect()->route('admin.posts.show', compact('post'));
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('admin.posts.index');
        // dd($post);
    }

    public function deletedIndex(Post $post)
    {
        $posts = Post::onlyTrashed()->paginate(10);
        return view('admin.post.deleted', compact('posts'));
    }

    public function restore(string $id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('admin.posts.show', $id);
    }

    public function obliterate(string $id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        \Storage::delete($post->image);
        $post->forceDelete();
        return redirect()->route('admin.posts.index');
    }
}