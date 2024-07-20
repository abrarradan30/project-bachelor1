<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DetailMateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Array modul untuk tiap materi_id
        $materiDetail = [
            1 => [
                'Konsep Dasar Basis Data', 'DBMS', 'ERD', 'Normalisasi', 'DBMS', 'Query Formal',
                'Query Terapan', 'Query Terapan Lanjutan', 'Basis Data Terdistribusi', 'SQL Dasar',
                'SQL Lanjutan', 'Keamanan Basis Data', 'Manajemen Transaksi', 'Merancang Basis Data Dengan DB Designer'
            ],
            2 => [
                'Optimasi Kueri', 'Manajemen Indeks', 'Partisi Tabel', 'Prosedur', 'Function', 'Trigger',
                'NoSQL', 'Replikasi Basis Data', 'Backup dan Recovery', 'Distribusi', 'Basis Data Berbasis Awan',
                'Big Data', 'Data Warehousing', 'Keamanan Basis Data Lanjut'
            ]
        ];

        // Loop through each materi_id
        foreach ($materiDetail as $materiId => $moduls) {
            foreach ($moduls as $modul) {
                DB::table('detail_materi')->insert([
                    'materi_id' => $materiId,
                    'modul' => $modul,
                    'isi_materi' => implode(' ', $faker->words(25)),  // Generates a random sentence
                ]);
            }
        }
    }
}
