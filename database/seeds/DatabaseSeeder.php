<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CustomerSeed::class);
        $this->call(ContactSeed::class);
        $this->call(PermissionSeed::class);
        $this->call(ProcessSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(UserActionSeed::class);
        $this->call(RoleSeedPivot::class);
        $this->call(UserSeedPivot::class);
    }
}
