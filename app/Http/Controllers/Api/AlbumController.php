<?php

namespace App\Http\Controllers\Api;

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

    public function index($group)
    {
        $resource = 'photos/' . $group;

        if (! Cache::get($resource)) {
            $albums = array_map('basename', Storage::directories($resource));
            Cache::forever($resource, $albums);
        }

        return response([
            'data' => [
                Cache::get($resource),
            ],
        ], 200);
    }
}
