<?php

namespace Database\Seeders;

use Database\Seeders\ERP\Painel\{
    ResourceRoleSeeder,
    ResourceSeeder,
    RoleSeeder,
    UserSeeder,
};

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            ResourceSeeder::class,
            ResourceRoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
