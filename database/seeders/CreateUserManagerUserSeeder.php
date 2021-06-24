<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUserManagerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'User Manager',
            'gender' => 'female',
            'birthday' => '2003/09/06',
            'phone' => '0254574667',
            'email' => 'usermanager@taskreate.com',
            'password' => Hash::make('123456')
        ]);
    }
}
