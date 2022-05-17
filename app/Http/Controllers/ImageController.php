<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ImageController extends Controller
{
    public function store(Request $request) {

        $image = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg,webp', 'max:20480', 'dimensions:min_width=200,min_height=200'],
        ]);

        Image::create([
            'image' => $image['image']->store('/'),
        ]);

        return redirect('/admin/images');

    }

    public function destroy(Image $image) {

        Storage::delete($image->image);
        $image->delete();
        return redirect('/admin/images');

    }

    public function download(Image $image) {
        $path = storage_path('app/public/'.$image->image);

        return response()->download($path);
    }
}
