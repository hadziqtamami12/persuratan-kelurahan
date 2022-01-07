<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        \App\Models\User::insert([
            [ 
                'name' => 'Left4code',
                'email' => 'midone@left4code.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'gender' => 'laki-laki',
                'active' => 1,
                'role' => 'su',
                'remember_token' => Str::random(10)
            ],

            [ 
                'name' => '12345678',
                'email' => 'user@left4code.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'gender' => 'laki-laki',
                'active' => 1,
                'role' => 'user',
                'remember_token' => Str::random(10)
            ],
            
        ]);

        // Fake users
        // User::factory()->times(9)->create();
    }
}
