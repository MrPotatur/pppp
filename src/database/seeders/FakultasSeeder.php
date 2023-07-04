<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakultass = [
            [
                'fakultasname'          => 'fasilkom',
                'nama'                  => 'fathur',
                'nim'                   => 20210803037,
                'prodi'                 => 'sistem informasi',
            ],
        ];

        Fakultas::insert($fakultass);
    }
}   