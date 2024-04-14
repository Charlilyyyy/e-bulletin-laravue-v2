<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Mohamad Taufik',
            'last_name' => 'Abd Rahman',
            'email' => 'mohamadtaufik099@gmail.com',
            'password' => Hash::make('qwer1234'),
        ]);

        User::create([
            'first_name' => 'Henry',
            'last_name' => 'Zachary',
            'email' => 'mohamadtaufik099+henry@gmail.com',
            'password' => Hash::make('qwer1234'),
        ]);
    }
}
