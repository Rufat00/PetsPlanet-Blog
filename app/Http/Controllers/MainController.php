<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class MainController extends Controller
{
    public function index(){
        return view('index', [
            'posts' => Post::with(['author', 'category'])->filter( request(['search', 'category', 'author']) )->latest()->paginate(12)->withQueryString(),
            'categories' => category::all()
        ]);
    }

    public function post(Post $post){
        
        return view('post', [
            'post' => $post
        ]);
    }
}
