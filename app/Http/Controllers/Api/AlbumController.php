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
            $directories = array_map('basename', Storage::directories($resource));

            $explode = function($self) {
                $array = explode('_', $self);
                return [
                    'date' => $array[0],
                    'title' => $array[1],
                    'subheading' => $array[2] ?? null,
                ];
            };

            return array_map($explode, $directories);
        });

        return response([
            'data' => $albums,
        ], 200);
    }
}
