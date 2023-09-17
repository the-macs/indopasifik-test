<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        \App\Models\User::factory(10)->create();

        // Kendaraan
        \App\Models\Kendaraan::insert(
            [
                [
                    'merk' => 'Honda',
                    'jenis' => 'MPV',
                    'nama' => 'Mobilio',
                    'nopol' => 'B 1234 ABC',
                ],
                [
                    'merk' => 'Mitsubishi',
                    'jenis' => 'SUV',
                    'nama' => 'Expander',
                    'nopol' => 'B 4321 ABC',
                ],
                [
                    'merk' => 'Mitsubishi',
                    'jenis' => 'SUV',
                    'nama' => 'Pajero Sport',
                    'nopol' => 'B 1111 ABC',
                ],
                [
                    'merk' => 'Mitsubishi',
                    'jenis' => 'Sedan',
                    'nama' => 'Lancer Evo X',
                    'nopol' => 'B 10 BCA',
                ],
                [
                    'merk' => 'Mercedes Benz',
                    'jenis' => 'Sedan',
                    'nama' => 'S450',
                    'nopol' => 'B 1 BCA',
                ],
                [
                    'merk' => 'BMW',
                    'jenis' => 'SUV',
                    'nama' => 'X1',
                    'nopol' => 'B 1 BMW',
                ],
                [
                    'merk' => 'BMW',
                    'jenis' => 'SUV',
                    'nama' => 'X2',
                    'nopol' => 'B 2 BMW',
                ],
                [
                    'merk' => 'BMW',
                    'jenis' => 'SUV',
                    'nama' => 'X3',
                    'nopol' => 'B 3 BMW',
                ],
                [
                    'merk' => 'BMW',
                    'jenis' => 'SUV',
                    'nama' => 'X4',
                    'nopol' => 'B 4 BMW',
                ],
                [
                    'merk' => 'BMW',
                    'jenis' => 'SUV',
                    'nama' => 'X5',
                    'nopol' => 'B 5 BMW',
                ],
                [
                    'merk' => 'Honda',
                    'jenis' => 'SUV',
                    'nama' => 'Jazz',
                    'nopol' => 'B 1990 HND',
                ]
            ],
        );
    }
}
