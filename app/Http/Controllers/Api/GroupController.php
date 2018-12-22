<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function index()
    {
        $groups = [];

        for ($i = now()->year; $i >= 2009; $i--) {
            array_push($groups, '第' . (string) ($i - 2009 + 1) . '屆');
        }

        if ($this->request->order == 'asc') {
            sort($groups, SORT_NATURAL);
        }

        return response([
            'data' => [
                $groups,
            ],
        ], 200);
    }
}
