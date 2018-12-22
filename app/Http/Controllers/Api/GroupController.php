<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function index(Group $group)
    {
        $groups = $group->all();

        return response([
            'data' => [
                $groups,
            ],
        ], 200);
    }
}
