<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Panggil seeder yang ingin Anda jalankan di sini
        $this->call(UserSeeder::class);
        // Tambahkan panggilan seeder lainnya jika diperlukan
    }
}
