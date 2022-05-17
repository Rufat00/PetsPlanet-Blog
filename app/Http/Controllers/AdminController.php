<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;
use App\Models\Post;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index',[
            'posts' => Post::filter( request(['search']) )->latest()->paginate(10)->withQueryString(),
        ]);
    }

    public function create(){
        return view('admin.create', [
            'categories' => category::all()
        ]);
    }

    public function edit(Post $post){
        return view('admin.edit',[
            'post' => $post,
            'categories' => category::all()
        ]);
    }

    public function categories(){
        return view('admin.categories',[
            'categories' => category::all()
        ]);
    }

    public function images(){
        return view('admin.images',[
            'images' => Image::latest()->paginate(15)->withQueryString()
        ]);
    }
}
