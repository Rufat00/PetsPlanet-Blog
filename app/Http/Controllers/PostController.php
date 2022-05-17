<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function store(Request $request) {

        $request['slug'] = preg_replace("/[^a-zA-Z0-9-]+/", "", str_replace(" ", "-", strtolower($request['title'])));

        $data = $request->validate([
            'title' => ['required', 'unique:posts', 'max:60'],
            'slug' => ['required', 'unique:posts', 'max:60'],
            'describtion' => ['required', 'max:200'],
            'thumbnail' => ['required', 'url'],
            'category' => ['required', 'exists:categories,id'],
            'body' => ['required']
        ]);

        Post::create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'describtion' => $data['describtion'],
            'thumbnail' => $data['thumbnail'],
            'body' => $data['body'],
            'user_id' => auth()->user()->id,
            'category_id' => $data['category']
        ]);

        return redirect('/admin/');

    }

    public function destroy(Post $post) {

        $post->delete();
        return redirect('/admin/');

    }

    public function update(Post $post){

        $data = request()->validate([
            'title' => ['required', Rule::unique('posts')->ignore($post->id), 'max:60'],
            'describtion' => ['required', 'max:200'],
            'thumbnail' => ['required', 'url'],
            'category' => ['required', 'exists:categories,id'],
            'body' => ['required']
        ]);

        $post->update([
            'title' => $data['title'],
            'slug' => preg_replace("/[^a-zA-Z0-9-]+/", "", str_replace(" ", "-", strtolower($data['title']))),
            'describtion' => $data['describtion'],
            'thumbnail' => $data['thumbnail'],
            'body' => $data['body'],
            'category_id' => $data['category']
        ]);

        return redirect('/admin/');
    }
}
