<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KuisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Array soal untuk tiap materi_id
        $isiKuis = [
            1 => [
                'Konsep Dasar Basis Data ?', 
                'DBMS dan ERD ?', 
                'Normalisasi ?', 
                'Query Formal ?',
                'Query Terapan dan lanjutan ?', 
                'Basis Data Terdistribusi ?', 
                'SQL Dasar ?',
                'SQL Lanjutan ?', 
                'Keamanan Basis Data ?', 
                'Manajemen Transaksi ?'
            ]
        ];

        // Loop through each materi_id
        foreach ($isiKuis as $materiId => $kuiss) {
            foreach ($kuiss as $soal) {
                $answers = ['benar', 'salah', 'salah', 'salah'];
                shuffle($answers); // Randomly shuffle the answers

                DB::table('kuis')->insert([
                    'materi_id' => $materiId,
                    'soal' => $soal,
                    'a' => $answers[0],
                    'b' => $answers[1],
                    'c' => $answers[2],
                    'd' => $answers[3],
                    'kunci' => 'benar',
                ]);
            }
        }
    }
}
