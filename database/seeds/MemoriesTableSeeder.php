<?php

use App\Memory;
use Illuminate\Database\Seeder;

class MemoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Memory::create([
            'group_id' => config('seeds.group.id'),
            'period' => config('seeds.memory.period'),
            'date' => config('seeds.memory.date'),
            'content' => config('seeds.memory.content'),
            'remarks' => config('seeds.memory.remarks'),
        ]);

        factory(Memory::class, config('factories.memory.number'))->create();
    }
}
