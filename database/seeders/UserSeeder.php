<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                // id 1
                'name' => 'Abrar Radan',
                'email' => 'abrar@gmail.com',
                'password' => Hash::make('admin123'),
                'deskripsi_diri' => 'seorang admin/developer',
                'foto' => 'foto-admin.jpg',
                'role' => 'admin',
            ],
            [
                // id 2
                'name' => 'Wawan',
                'email' => 'wawan@gmail.com',
                'password' => Hash::make('wawan123'),
                'deskripsi_diri' => 'seorang mentor',
                'foto' => 'foto-mentor.jpg',
                'role' => 'mentor',
            ],
            [
                // id 3
                'name' => 'Bahar',
                'email' => 'bahar@gmail.com',
                'password' => Hash::make('bahar123'),
                'deskripsi_diri' => 'seorang mentor',
                'foto' => 'foto-mentor.jpg',
                'role' => 'mentor',
            ],
            [
                // id 4
                'name' => 'Dede',
                'email' => 'dede@gmail.com',
                'password' => Hash::make('dede1234'),
                'deskripsi_diri' => 'seorang siswa/mahasiswa',
                'foto' => 'foto-siswa.jpg',
                'role' => 'siswa',
            ],
            [
                // id 5
                'name' => 'Bobi',
                'email' => 'bobi@gmail.com',
                'password' => Hash::make('bobi1234'),
                'deskripsi_diri' => 'seorang siswa/mahasiswa',
                'foto' => 'foto-siswa.jpg',
                'role' => 'siswa',
            ],
            [
                // id 6
                'name' => 'Sari',
                'email' => 'sari@gmail.com',
                'password' => Hash::make('sari1234'),
                'deskripsi_diri' => 'seorang siswa/mahasiswa',
                'foto' => 'foto-siswa.jpg',
                'role' => 'siswa',
            ],
            [
                // id 7
                'name' => 'Dewi',
                'email' => 'dewi@gmail.com',
                'password' => Hash::make('dewi1234'),
                'deskripsi_diri' => 'seorang siswa/mahasiswa',
                'foto' => 'foto-siswa.jpg',
                'role' => 'siswa',
            ],
            [
                // id 8
                'name' => 'Budi',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('budi1234'),
                'deskripsi_diri' => 'seorang siswa/mahasiswa',
                'foto' => 'foto-siswa.jpg',
                'role' => 'siswa',
            ],
            [
                // id 9
                'name' => 'Rina',
                'email' => 'rina@gmail.com',
                'password' => Hash::make('rina1234'),
                'deskripsi_diri' => 'seorang siswa/mahasiswa',
                'foto' => 'foto-siswa.jpg',
                'role' => 'siswa',
            ],
            [
                // id 10
                'name' => '201131001@mhs.stiki.ac.id Andi',
                'email' => '201131001@mhs.stiki.ac.id',
                'password' => Hash::make('andi1234'),
                'deskripsi_diri' => 'seorang siswa/mahasiswa',
                'foto' => 'foto-siswa.jpg',
                'role' => 'siswa',
            ],
            [
                // id 11
                'name' => '201131002@mhs.stiki.ac.id Lina',
                'email' => '201131002@mhs.stiki.ac.id',
                'password' => Hash::make('lina1234'),
                'deskripsi_diri' => 'seorang siswa/mahasiswa',
                'foto' => 'foto-siswa.jpg',
                'role' => 'siswa',
            ],
            [
                // id 12
                'name' => '201131003@mhs.stiki.ac.id Joko',
                'email' => '201131003@mhs.stiki.ac.id',
                'password' => Hash::make('joko1234'),
                'deskripsi_diri' => 'seorang siswa/mahasiswa',
                'foto' => 'foto-siswa.jpg',
                'role' => 'siswa',
            ],
            [
                // id 13
                'name' => '201131004@mhs.stiki.ac.id Maya',
                'email' => '201131004@mhs.stiki.ac.id',
                'password' => Hash::make('maya1234'),
                'deskripsi_diri' => 'seorang siswa/mahasiswa',
                'foto' => 'foto-siswa.jpg',
                'role' => 'siswa',
            ],
            [
                // id 14
                'name' => '201131005@mhs.stiki.ac.id Rudi',
                'email' => '201131005@mhs.stiki.ac.id',
                'password' => Hash::make('rudi1234'),
                'deskripsi_diri' => 'seorang siswa/mahasiswa',
                'foto' => 'foto-siswa.jpg',
                'role' => 'siswa',
            ],
        ]);
    }
}
