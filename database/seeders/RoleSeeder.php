<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role = new Role();
        $role->name = 'user';
        $role->description = 'Este tipo de rol podrá tener acceso para reportar incidentes como usuario estandar';
        $role->save();

        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Este tipo de rol podrá tener acceso a todos los metodos crud';
        $role->save();
    }
}
