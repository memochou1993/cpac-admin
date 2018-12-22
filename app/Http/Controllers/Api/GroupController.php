<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    protected $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    public function index()
    {
        $groups = $this->group->get();

        return response([
            'data' => [
                $groups,
            ],
        ], 200);
    }
}
