<?php

namespace App\Http\Controllers\Api;

use Cache;
use Storage;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function index($category)
    {
        $resource = 'albums';

        $minutes = config('default.cache.minutes.albums');

        $path = implode('/', [
            'images',
            $category,
        ]);

        $albums = Cache::remember($resource, $minutes, function () use ($path) {
            return array_map('basename', Storage::directories($path));
        });

        return response([
            'data' => $albums,
        ], 200);
    }
}
