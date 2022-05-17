<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UsersController;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [MainController::class, 'post']);
Route::post('/post/comment', [CommentController::class, 'store']);
Route::delete('/post/comment/{comment}', [CommentController::class, 'destroy']);

Route::get('/registration', function () { 
    return view('auth/registration');
})->name('auth.registration')->middleware('guest');

Route::post('/auth/register', [AuthController::class, 'register'])->middleware('guest');

Route::get('/login', function () { 
    return view('auth/login');
})->name('auth.login')->middleware('guest');

Route::post('/auth/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.home')->middleware('admin');
Route::post('/admin/posts', [PostController::class, 'store'])->middleware('admin');
Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->middleware('admin')->middleware('admin.posts');
Route::patch('/admin/posts/{post}', [PostController::class, 'update'])->middleware('admin')->middleware('admin.posts');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create')->middleware('admin');
Route::get('/admin/posts/edit/{post}', [AdminController::class, 'edit'])->middleware('admin')->middleware('admin.posts');

Route::get('/admin/categories', [AdminController::class, 'categories'])->middleware('admin');
Route::post('/admin/categories', [CategoryController::class, 'store'])->middleware('admin')->middleware('admin.categories');
Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->middleware('admin')->middleware('admin.categories');

Route::get('/admin/images', [AdminController::class, 'images'])->middleware('admin');
Route::post('/admin/images', [ImageController::class, 'store'])->middleware('admin')->middleware('admin.images');
Route::delete('/admin/images/{image}', [ImageController::class, 'destroy'])->middleware('admin')->middleware('admin.images');
Route::get('/admin/images/{image}', [ImageController::class, 'download'])->middleware('admin'); 

Route::get('/admin/roles', [RolesController::class, 'index'])->middleware('admin');
Route::get('/admin/roles/create', [RolesController::class, 'create'])->middleware('admin')->middleware('admin.roles');
Route::get('/admin/roles/edit/{role}', [RolesController::class, 'edit'])->middleware('admin')->middleware('admin.roles');

Route::post('/admin/roles/', [RolesController::class, 'store'])->middleware('admin')->middleware('admin.roles');
Route::delete('/admin/roles/{role}', [RolesController::class, 'destroy'])->middleware('admin')->middleware('admin.roles');
Route::patch('/admin/roles/{role}', [RolesController::class, 'update'])->middleware('admin')->middleware('admin.roles');

Route::get('/admin/users', [UsersController::class, 'index'])->middleware('admin')->middleware('admin.users');;
Route::get('/admin/users/{user}', [UsersController::class, 'edit'])->middleware('admin')->middleware('admin.users');
Route::post('/admin/users/{user}', [UsersController::class, 'update'])->middleware('admin')->middleware('admin.users');;