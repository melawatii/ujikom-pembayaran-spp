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
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => Hash::make('123'),
                'nama_petugas' => 'Alice',
                'level' => 'Admin',
            ],
            [
                'username' => 'petugas',
                'password' => Hash::make('123'),
                'nama_petugas' => 'Pharsa',
                'level' => 'Petugas',
            ],
            [
                'username' => '0045653673',
                'password' => Hash::make('123'),
                'nama_petugas' => 'Melawati',
                'level' => 'Siswa',
            ]
        ];

        User::insert($data);
    }
}
