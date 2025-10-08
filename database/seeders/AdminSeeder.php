<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exists = (bool)User::query()->where('email', 'admin@admi.n')->count();
        if (!$exists) {
            User::query()->create([
                'name'     => "Admin",
                'email'    => "admin@admi.n",
                'password' => Hash::make("password"),
            ]);
        }
    }
}
