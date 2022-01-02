<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = $this->validatePost();

        $attributes['thumbnail'] = request()->file('thumbnail')->storeAs('thumbnails', request('title') . '.png');
        $attributes['user_id'] = auth()->user()->id;

        if (request()->has('publish')) {
            $attributes['status'] = 1;
            $attributes['published_at'] = now();
            Post::create($attributes);
            return redirect('/')->with('success', 'Post has been published.');
        }

        Post::create($attributes);
        return redirect('/admin/posts')->with('success', 'Post has been moved to draft.');

    }

    /**
     * @param Post $post
     * @return array
     */
    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();
        return request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);
        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->storeAs('thumbnails', request('title') . '.png');
        }

        if (request()->has('publish')) {
            $attributes['status'] = 1;
            $attributes['published_at'] = now();
            $post->update($attributes);
            return redirect('/admin/posts')->with('success', 'Post has been published.');
        }

        $post->update($attributes);
        return back()->with('success', 'Post has been updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post has been deleted.');
    }

}
