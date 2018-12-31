<?php

namespace App\Http\Controllers\Api\Gallery;

use Cache;
use Storage;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $resource = implode('/', [
            'images',
        ]);

        $minutes = config('default.cache.minutes.categories');

        $categories = Cache::remember($resource, $minutes, function () use ($resource) {
            return array_map('basename', Storage::directories($resource));
        });

        return response([
            'data' => $categories,
        ], 200);
    }
}
