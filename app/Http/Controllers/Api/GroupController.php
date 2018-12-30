<?php

namespace App\Http\Controllers\Api;

use Cache;
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
        $resource = 'groups';

        $minutes = config('default.cache.minutes.groups');

        $groups = Cache::remember($resource, $minutes, function () {
            return $this->group->pluck('name')->all();
        });

        return response([
            'data' => $groups,
        ], 200);
    }
}
