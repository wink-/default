<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'user_action_access',],
            ['id' => 18, 'title' => 'user_action_create',],
            ['id' => 19, 'title' => 'user_action_edit',],
            ['id' => 20, 'title' => 'user_action_view',],
            ['id' => 21, 'title' => 'user_action_delete',],
            ['id' => 22, 'title' => 'quote_access',],
            ['id' => 23, 'title' => 'customer_access',],
            ['id' => 24, 'title' => 'customer_create',],
            ['id' => 25, 'title' => 'customer_edit',],
            ['id' => 26, 'title' => 'customer_view',],
            ['id' => 27, 'title' => 'customer_delete',],
            ['id' => 28, 'title' => 'contact_access',],
            ['id' => 29, 'title' => 'contact_create',],
            ['id' => 30, 'title' => 'contact_edit',],
            ['id' => 31, 'title' => 'contact_view',],
            ['id' => 32, 'title' => 'contact_delete',],
            ['id' => 33, 'title' => 'process_access',],
            ['id' => 34, 'title' => 'process_create',],
            ['id' => 35, 'title' => 'process_edit',],
            ['id' => 36, 'title' => 'process_view',],
            ['id' => 37, 'title' => 'process_delete',],
            ['id' => 38, 'title' => 'quote_create',],
            ['id' => 39, 'title' => 'quote_edit',],
            ['id' => 40, 'title' => 'quote_view',],
            ['id' => 41, 'title' => 'quote_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
