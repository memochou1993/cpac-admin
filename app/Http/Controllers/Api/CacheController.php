<?php

namespace App\Http\Controllers\Api;

use Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CacheController extends Controller
{
    public function destroy()
    {
        if (Cache::flush()) {
            return response(null, 204);
        }
    }
}
