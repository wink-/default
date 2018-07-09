<?php

use Illuminate\Database\Seeder;

class UserActionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'user_id' => 1, 'action' => 'created', 'action_model' => 'roles', 'action_id' => 3,],
            ['id' => 2, 'user_id' => 1, 'action' => 'created', 'action_model' => 'roles', 'action_id' => 4,],
            ['id' => 3, 'user_id' => 1, 'action' => 'created', 'action_model' => 'customers', 'action_id' => 1,],
            ['id' => 4, 'user_id' => 1, 'action' => 'created', 'action_model' => 'contacts', 'action_id' => 1,],
            ['id' => 5, 'user_id' => 1, 'action' => 'created', 'action_model' => 'processes', 'action_id' => 1,],

        ];

        foreach ($items as $item) {
            \App\UserAction::create($item);
        }
    }
}
