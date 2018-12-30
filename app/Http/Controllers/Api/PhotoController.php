<?php

namespace App\Http\Controllers\Api;

use Cache;
use Storage;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function index($category, $album)
    {
        $resource = 'photos';

        $minutes = config('default.cache.minutes.photos');

        $path = implode('/', [
            'images',
            $category,
            $album,
        ]);

        $photos = Cache::remember($resource, $minutes, function () use ($path) {
            return array_map('basename', Storage::files($path));
        });

        return response([
            'data' => $photos,
        ], 200);
    }
}
