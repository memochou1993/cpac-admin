<?php

namespace App\Http\Controllers\Api;

use App\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    protected $link;
    protected $request;
    protected $try_times;
    protected $code_length;

    public function __construct(Link $link, Request $request)
    {
        $this->link = $link;
        $this->request = $request;
        $this->try_times = config('default.link.try.times');
        $this->code_length = config('default.link.code.length');
    }

    public function index()
    {
        $try_times = 0;

        do {
            try {
                $link = Link::firstOrNew([
                    'url' => $this->request->url,
                ]);

                if (! $link->exists) {
                    $link->code = str_random($this->code_length);
                    $link->save();
                }

                return $link;
            } catch (\Exception $e) {
                $try_times++;

                if ($try_times === $this->try_times) {
                    return response([
                        'error' => $e->getMessage(),
                    ], 400);
                }
            }
        } while ($try_times <= $this->try_times);
    }
}
