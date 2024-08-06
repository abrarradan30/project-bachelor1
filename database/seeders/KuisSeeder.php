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
            ],
            2 => [
                'Optimasi Kueri ?', 
                'Manajemen Indeks ?', 
                'Prosedur ?', 
                'Function ?', 
                'Trigger ?',
                'Replikasi Basis Data ?', 
                'Backup dan Recovery ?', 
                'Distribusi ?', 
                'Big Data ?', 
                'Keamanan Basis Data Lanjut ?'
            ],
            3 => [
                'Pengenalan HTML ?', 
                'Struktur Dokumen HTML ?', 
                'CSS Dasar ?', 
                'Formulir HTML ?', 
                'Pengenalan JavaScript ?', 
                'DOM Manipulasi ?', 
                'Event Handling ?',
                'Responsive Design ?', 
                'Bootstrap ?',  
                'Web Storage dan Deployment Web ?'
            ],
            4 => [
                'Advanced JavaScript ?', 
                'JavaScript Asynchronous ?', 
                'Node.js dan Express.js ?', 
                'RESTful API ?', 
                'Web Security ?', 
                'WebSocket ?', 
                'Mongoose & MongoDB ?',  
                'Version Control with Git ?', 
                'CI/CD Pipelines ?', 
                'Deployment and Scaling ?'
            ],
            5 => [
                'Pengenalan Logika ?', 
                'Pernyataan dan Variabel ?', 
                'Operasi Logika ?', 
                'Flowchart ?', 
                'Pseudocode ?', 
                'Algoritma Dasar ?', 
                'Kontrol Alur ?', 
                'Struktur Data Dasar ?', 
                'Rekursi ?', 
                'Algoritma Sorting ?', 
            ],
            6 => [
                'Pengenalan Karakter ?', 
                'Etika dan Moral ?', 
                'Komunikasi Efektif ?', 
                'Kerja Tim ?', 
                'Manajemen Waktu ?', 
                'Penyelesaian Konflik ?', 
                'Kepemimpinan ?', 
                'Kepercayaan Diri ?', 
                'Motivasi Diri dan Empati ?', 
                'Pengembangan Diri ?', 
            ],
            7 => [
                'Pengenalan Desain Grafis ?',
                'Prinsip Desain ?', 
                'Elemen Desain ?', 
                'Teori Warna ?', 
                'Tipografi ?', 
                'Layout dan Komposisi ?', 
                'Software Desain ?', 
                'Desain Logo, Poster, Brosur, Kemasan ?', 
                'Desain Media Sosial ?', 
                'Portofolio Desain ?'   
            ],
            8 => [
                'Pengenalan UI/UX ?', 
                'User Stories ?', 
                'Wireframing ?', 
                'Prototyping ?', 
                'Desain Interaksi ?', 
                'Prinsip UI Desain ?', 
                'UX Writing ?', 
                'Usability Testing ?',   
                'UI Patterns ?', 
                'Design Systems ?'     
            ],
            9 => [
                'Pengenalan Manajemen Layanan TI ?', 
                'Kerangka Kerja ITIL ?', 
                'SLA dan OLA ?', 
                'Service Strategy ?', 
                'Service Design ?', 
                'Service Transition ?', 
                'Service Operation ?', 
                'Continuous Service Improvement ?',  
                'Change Management ?', 
                'Asset and Configuration Management ?', 
            ],
            10 => [
                'Pengenalan Tata Kelola TI ?', 
                'Kerangka Kerja COBIT ?', 
                'IT Governance Principles ?', 
                'Risk Management ?', 
                'IT Strategy Alignment ?', 
                'Resource Management ?', 
                'Audit TI ?', 
                'Security Governance ?', 
                'Ethics in IT Governance ?', 
                'Policy Development ?', 
            ],
            11 => [
                'Pengenalan Keamanan Informasi ?', 
                'Ancaman dan Kerentanan ?', 
                'Kebijakan Keamanan ?', 
                'Kontrol Akses ?',  
                'Keamanan Jaringan ?', 
                'Keamanan Aplikasi ?', 
                'Manajemen Insiden ?', 
                'Perencanaan Pemulihan Bencana ?', 
                'Perlindungan Data Pribadi ?', 
                'Keamanan Fisik ?' 
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
