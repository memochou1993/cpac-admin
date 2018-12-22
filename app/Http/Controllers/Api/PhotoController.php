<?php

namespace App\Http\Controllers\Api;

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

    public function index($group, $album)
    {
        $resource = 'photos/' . $group . '/' . $album;

        if (! Cache::get($resource)) {
            $photos = array_map('basename', Storage::files($resource));
            Cache::forever($resource, $photos);
        }

        return response([
            'data' => [
                Cache::get($resource),
            ],
        ], 200);
    }
}
