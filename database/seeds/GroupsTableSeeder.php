<?php

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
        App\Group::insert([
            [
                'name' => '第1屆',
            ],
            [
                'name' => '第2屆',
            ],
            [
                'name' => '第3屆',
            ],
            [
                'name' => '第4屆',
            ],
            [
                'name' => '第5屆',
            ],
            [
                'name' => '第6屆',
            ],
            [
                'name' => '第7屆',
            ],
            [
                'name' => '第8屆',
            ],
            [
                'name' => '第9屆',
            ],
            [
                'name' => '第10屆',
            ],
        ]);
    }
}
