<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'image' => 'required|image|max:2048'
        ]);

        $path = $request->file('image')->store('posts');
        $fullPath = Storage::disk('s3')->url($path);

        $image = Image::create([
            'filename' => basename($path),
            'url' => $fullPath,
            'imageable_id' => $post->id,
            'imageable_type' => Post::class
        ]);

        $response = [
            'id' =>  $image->id,
            'url' => $fullPath
        ];

        return $response;
    }

    public function delete(Request $request)
    {
        $image = Image::findOrFail($request->id);
        $deleted = Storage::disk('s3')->delete('posts/' . $image->filename);
        $image->delete();
        return new JsonResponse(['was_deleted' => $deleted], 200);
    }
}
