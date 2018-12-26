<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => config('seeds.user.name'),
            'email' => config('seeds.user.email'),
            'email_verified_at' => config('seeds.user.email_verified_at'),
            'password' => config('seeds.user.password'),
            'remember_token' => config('seeds.user.remember_token'),
        ]);

        factory(User::class, config('factories.user.number'))->create();
    }
}
