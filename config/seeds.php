<?php

return [

    /*
    |--------------------------------------------------------------------------
    |
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    'user' => [
        'id' => 1,
        'name' => 'Test User',
        'email' => 'default@test.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ],

    'group' => [
        'id' => 1,
        'name' => 'Test Group',
    ],

    'memory' => [
        'id' => 1,
        'period' => 'Test Period',
        'date' => '2019-01-01',
        'content' => 'Test Content',
        'remarks' => 'Test Remarks',
    ],

];
