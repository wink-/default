<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$.Z0Z3hUJ8dO1ve350h8F7uAB76FbHxHFN3Ur00cHdlJF18Z8lsfFa', 'remember_token' => ''],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
