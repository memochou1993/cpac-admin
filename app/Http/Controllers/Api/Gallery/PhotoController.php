<?php

namespace App\Http\Controllers\Api\Gallery;

use Cache;
use Storage;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function index($category, $album)
    {
        $resource = implode('/', [
            'images',
            $category,
            $album,
        ]);

        $minutes = config('default.cache.minutes.photos');

        $photos = Cache::remember($resource, $minutes, function () use ($resource) {
            return array_map('basename', Storage::files($resource));
        });

        return response([
            'data' => $photos,
        ], 200);
    }
}
