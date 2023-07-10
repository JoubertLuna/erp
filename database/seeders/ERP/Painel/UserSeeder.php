<?php

namespace Database\Seeders\ERP\Painel;

use App\Models\ERP\Painel\{
    Role,
    User,
};

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $RoleSuperAdministrador = Role::first()->id;

        User::create([
            'name' => 'Super Administrador - AZ_ERP',
            'email' => 'super@erp.com',
            'password' => Hash::make('@super123'),
            'role_id' => $RoleSuperAdministrador,
        ]);
    }
}
