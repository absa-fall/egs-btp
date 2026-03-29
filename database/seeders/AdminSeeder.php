<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder {
    public function run(): void {
        User::create([
            'name'     => 'Admin EGS',
            'email'    => 'admin@egsbtp.sn',
            'password' => Hash::make('egsbtp2025'),
        ]);
    }
}