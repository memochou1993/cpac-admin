<?php

namespace App\Http\Controllers\Api;

use Cache;
use Storage;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function index($category)
    {
        $resource = implode('/', [
            'images',
            $category,
        ]);

        $minutes = config('default.cache.minutes.albums');

        $albums = Cache::remember($resource, $minutes, function () use ($resource) {
            return array_map('basename', Storage::directories($resource));
        });

        return response([
            'data' => $albums,
        ], 200);
    }
}
