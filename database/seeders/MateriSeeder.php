<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('materi')->insert([
            [
                // id 1
                'judul' => 'Basis Data 1',
                'bg_materi' => 'bg_materi.jpg',
                'deskripsi' => 'Belajar tentang konsep dan implementasi basis data 1.',
                'harga' => 10000,
                'kategori' => 'IT',
                'level' => 'pemula',
                'status' => 'publik',
            ],
            [
                // id 2
                'judul' => 'Basis Data 2',
                'bg_materi' => 'bg_materi.jpg',
                'deskripsi' => 'Belajar tentang konsep dan implementasi basis data 2.',
                'harga' => 15000,
                'kategori' => 'IT',
                'level' => 'Menengah',
                'status' => 'publik',
            ],
            [
                // id 3
                'judul' => 'Pemrograman Web 1',
                'bg_materi' => 'bg_materi.jpg',
                'deskripsi' => 'Belajar pemrograman web 1.',
                'harga' => 10000,
                'kategori' => 'IT',
                'level' => 'pemula',
                'status' => 'publik',
            ],
            [
                // id 4
                'judul' => 'Pemrograman Web 2',
                'bg_materi' => 'bg_materi.jpg',
                'deskripsi' => 'Belajar pemrograman web 2.',
                'harga' => 15000,
                'kategori' => 'IT',
                'level' => 'menengah',
                'status' => 'publik',
            ],
            [
                // id 5 
                'judul' => 'Logika & Algoritma',
                'bg_materi' => 'bg_materi.jpg',
                'deskripsi' => 'Belajar logika & algoritma pemrograman.',
                'harga' => 10000,
                'kategori' => 'IT',
                'level' => 'pemula',
                'status' => 'publik', 
            ],
            [
                // id 6
                'judul' => 'Pembentukan Karakter',
                'bg_materi' => 'bg_materi.jpg',
                'deskripsi' => 'Belajar pengenalan karakter individu.',
                'harga' => 10000,
                'kategori' => 'softskill',
                'level' => 'pemula',
                'status' => 'publik', 
            ],
            [
                // id 7
                'judul' => 'Desain Grafis',
                'bg_materi' => 'bg_materi.jpg',
                'deskripsi' => 'Belajar desain dengan affinity designer.',
                'harga' => 10000,
                'kategori' => 'desain',
                'level' => 'pemula',
                'status' => 'publik', 
            ],
            [
                // id 8
                'judul' => 'Desain UI/UX',
                'bg_materi' => 'bg_materi.jpg',
                'deskripsi' => 'Belajar dengan tools figma.',
                'harga' => 10000,
                'kategori' => 'desain',
                'level' => 'menengah',
                'status' => 'publik', 
            ],
            [
                // id 9
                'judul' => 'Manajemen Layanan TI',
                'bg_materi' => 'bg_materi.jpg',
                'deskripsi' => 'Belajar metode pengelolaan sistem teknologi informasi.',
                'harga' => 10000,
                'kategori' => 'IT',
                'level' => 'pemula',
                'status' => 'publik', 
            ],
            [
                // id 10
                'judul' => 'Tata Kelola TI',
                'bg_materi' => 'bg_materi.jpg',
                'deskripsi' => 'Belajar proses yang dilakukan untuk memastikan penggunaan IT berjalan dengan efektif dan efisien.',
                'harga' => 10000,
                'kategori' => 'IT',
                'level' => 'pemula',
                'status' => 'publik', 
            ],
            [
                // id 11
                'judul' => 'Keamanan Informasi',
                'bg_materi' => 'bg_materi.jpg',
                'deskripsi' => 'Belajar dan dapat memahami tentang konsep keamanan informasi.',
                'harga' => 10000,
                'kategori' => 'IT',
                'level' => 'mahir',
                'status' => 'publik', 
            ],
        ]);
    }
}
