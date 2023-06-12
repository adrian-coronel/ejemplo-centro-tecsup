<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminDefultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->id_role = 2;
        $user->name = 'CATEC';
        $user->email = 'centrodeayuda.tecsup@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('Tecsup123');
        $user->remember_token = Str::random(10);
        $user->save();
    }
}