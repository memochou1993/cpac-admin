<?php

namespace App\Http\Controllers\Web\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function show()
    {
        $resource = implode('/', [
            'images',
            $this->request->size,
            $this->request->category,
            $this->request->album,
            $this->request->photo,
        ]);

        $path = public_path('/storage/' . $resource);

        return $this->request->download ? response()->download($path) : response()->file($path);
    }
}
