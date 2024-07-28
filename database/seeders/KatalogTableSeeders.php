<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KatalogTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('katalog')->insert([
            [
                'nama_katalog' => 'Paket Pernikahan Silver',
                'deskripsi' => 'Paket pernikahan silver termasuk dekorasi, catering untuk 100 orang, dan dokumentasi.',
                'gambar' => 'silver_package.jpg',
                'harga' => 15000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_katalog' => 'Paket Pernikahan Gold',
                'deskripsi' => 'Paket pernikahan gold termasuk dekorasi, catering untuk 200 orang, dokumentasi, dan live music.',
                'gambar' => 'golden_package.jpg',
                'harga' => 30000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_katalog' => 'Paket Pernikahan Platinum',
                'deskripsi' => 'Paket pernikahan platinum termasuk dekorasi, catering untuk 500 orang, dokumentasi, live music, dan honeymoon package.',
                'gambar' => 'platinum_package.jpg',
                'harga' => 50000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
