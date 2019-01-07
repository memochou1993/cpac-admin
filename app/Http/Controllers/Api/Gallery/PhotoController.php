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
                $array = explode('/', str_replace('images/web/', '', $self));

                $params = config('app.url') . '/gallery/photos?' . http_build_query([
                    'category' => $array[0],
                    'album' => $array[1],
                    'photo' => $array[2],
                ]);

                return [
                    'name' => basename($self, '.jpg'),
                    'path' => [
                        'web' => $params . '&size=web',
                        'raw' => $params . '&size=raw',
                        'download' => $params . '&size=raw&download=true',
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
