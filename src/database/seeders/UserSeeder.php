<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sa = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Super Admin', 'password' => Hash::make('password')]
        );
        $sa->assignRole('super_admin');

        $akademik = User::firstOrCreate(
            ['email' => 'akademik@admin.com'],
            ['name' => 'Akademik Account', 'password' => Hash::make('password')]
        );
        $akademik->assignRole('akademik');

        $guru = User::firstOrCreate(
            ['email' => 'guru@admin.com'],
            ['name' => 'Guru Account', 'password' => Hash::make('password')]
        );
        $guru->assignRole('guru');

        $siswa = User::firstOrCreate(
            ['email' => 'siswa@admin.com'],
            ['name' => 'Siswa Account', 'password' => Hash::make('password')]
        );
        $siswa->assignRole('siswa');

        $orang_tua = User::firstOrCreate(
            ['email' => 'ortu@admin.com'],
            ['name' => 'Orang Tua Account', 'password' => Hash::make('password')]
        );
        $orang_tua->assignRole('orang_tua');
    }
}
