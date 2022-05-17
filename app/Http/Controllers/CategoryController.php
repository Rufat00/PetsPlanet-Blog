<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'category' => ['required', 'unique:categories'],
        ]);

        $category = str_replace(" ", "-", $data['category']);

        Category::create([
            'category' => $category,
            'slug' => strtolower($category)
        ]);

        return redirect('/admin/categories');

    }

    public function destroy(Category $category) {

        $category->delete();
        return redirect('/admin/categories');

    }
}
