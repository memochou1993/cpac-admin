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
            $explode = function($self) {
                return [
                    'name' => basename($self, '.jpg'),
                    'path' => config('app.url') . '/storage/' . $self,
                ];
            };

            return array_map($explode, Storage::files($resource));
        });

        return response([
            'data' => $photos,
        ], 200);
    }
}
