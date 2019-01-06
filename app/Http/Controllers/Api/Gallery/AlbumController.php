<?php

namespace App\Http\Controllers\Api\Gallery;

use Cache;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
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
        ]);

        $minutes = config('default.cache.minutes.albums');

        $albums = Cache::remember($resource, $minutes, function () use ($resource) {
            $directories = array_map('basename', Storage::directories($resource));

            $explode = function($self) {
                $array = explode('_', $self);
                return [
                    'date' => $array[0],
                    'title' => $array[1],
                    'subtitle' => $array[2] ?? null,
                ];
            };

            return array_map($explode, $directories);
        });

        return response([
            'data' => $albums,
        ], 200);
    }
}
