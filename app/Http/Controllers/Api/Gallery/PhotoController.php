<?php

namespace App\Http\Controllers\Api\Gallery;

use Cache;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $resource = implode('/', [
            'images',
            'web',
            $this->request->category,
            $this->request->album,
        ]);

        $minutes = config('default.cache.minutes.photos');

        $photos = Cache::remember($resource, $minutes, function () use ($resource) {
            $explode = function($self) {
                return [
                    'name' => basename($self, '.jpg'),
                    'path' => [
                        'web' => str_replace('images/web/', config('app.url') . '/storage/images/web/', $self),
                        'raw' => str_replace('images/web/', config('app.url') . '/storage/images/raw/', $self),
                    ],
                ];
            };

            return array_map($explode, Storage::files($resource));
        });

        return response([
            'data' => $photos,
        ], 200);
    }
}
