<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Barış Kahraman',
            'kullaniciTipi' => 'ADMIN',
            'email' => 'baris@blog.com',
            'password' => Hash::make('123123123'),
        ]);
    }
}
