<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrator',
            'gender' => 'male',
            'birthday' => '1990/10/10',
            'phone' => '0278634567',
            'email' => 'admin@taskreate.com',
            'password' => Hash::make('123456')
        ]);
    }
}
