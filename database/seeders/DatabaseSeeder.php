<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Ousmane Diallo',
            'email' => "email@gmail.com",
            'phone' => '221770000000',
            'adress' => 'Kedougou',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'status' => 1,
            'is_active' => 1,
            'is_admin' => 1,
            'slug' => str_replace('/','',Hash::make(Str::random(20).'admin/email@gmail.com')),
            'confirmation_token' => null
        ]);
    }
}
