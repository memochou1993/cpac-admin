<?php

use App\Group;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'name' => config('seeds.group.name'),
        ]);

        for ($i = 1; $i <= config('factories.group.number'); $i++) {
            $groups[] = [
                'name' => '第 ' . $i . ' 屆',
            ];
        }

        Group::insert($groups);
    }
}
