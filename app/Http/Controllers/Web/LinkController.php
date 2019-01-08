<?php

namespace App\Http\Controllers\Web;

use App\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    protected $link;
    protected $request;

    public function __construct(Link $link, Request $request)
    {
        $this->link = $link;
        $this->request = $request;
    }

    public function index()
    {
        $link = Link::where('code', $this->request->code)->value('url') ?? null;

        if (! $link) {
            abort(404);
        }

        return redirect($link);
    }
}
