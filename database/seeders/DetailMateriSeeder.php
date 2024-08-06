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
            ],
            3 => [
                'Pengenalan HTML', 'Struktur Dokumen HTML', 'CSS Dasar', 'Formulir HTML', 'Pengenalan JavaScript', 
                'DOM Manipulasi', 'Event Handling', 'CSS Layout', 'Responsive Design', 'Bootstrap', 'AJAX', 'JSON', 
                'Web Storage', 'Deployment Web'
            ], 
            4 => [
                'Advanced JavaScript', 'JavaScript Asynchronous', 'Node.js', 'Express.js', 'RESTful API', 'Web Security', 
                'Session Management', 'WebSocket', 'Mongoose & MongoDB', 'Template Engines', 'Unit Testing', 
                'Version Control with Git', 'CI/CD Pipelines', 'Deployment and Scaling'
            ],
            5 => [
                'Pengenalan Logika', 'Pernyataan dan Variabel', 'Operasi Logika', 'Flowchart', 'Pseudocode', 'Algoritma Dasar', 
                'Kontrol Alur', 'Struktur Data Dasar', 'Rekursi', 'Algoritma Sorting', 'Algoritma Searching', 
                'Analisis Kompleksitas', 'Algoritma Greedy', 'Dynamic Programming'
            ],
            6 => [
                'Pengenalan Karakter', 'Etika dan Moral', 'Komunikasi Efektif', 'Kerja Tim', 'Manajemen Waktu', 
                'Penyelesaian Konflik', 'Kepemimpinan', 'Kepercayaan Diri', 'Tanggung Jawab', 'Motivasi Diri', 
                'Pengembangan Diri', 'Adaptasi dan Fleksibilitas', 'Empati', 'Pengambilan Keputusan'
            ],
            7 => [
                'Pengenalan Desain Grafis', 'Elemen Desain', 'Teori Warna', 'Tipografi', 'Prinsip Desain', 'Layout dan Komposisi', 
                'Software Desain', 'Desain Logo', 'Desain Poster', 'Desain Brosur', 'Desain Kemasan', 'Desain Web', 
                'Desain Media Sosial', 'Portofolio Desain'
            ],
            8 => [
                'Pengenalan UI/UX', 'Penelitian Pengguna', 'Personas', 'User Stories', 'Wireframing', 'Prototyping', 'Desain Interaksi', 
                'Prinsip UI Desain', 'UX Writing', 'Usability Testing', 'Responsive Design', 'Accessibility', 
                'UI Patterns', 'Design Systems'
            ],
            9 => [
                'Pengenalan Manajemen Layanan TI', 'Kerangka Kerja ITIL', 'SLA dan OLA', 'Service Strategy', 'Service Design', 
                'Service Transition', 'Service Operation', 'Continuous Service Improvement', 'Incident Management', 'Problem Management', 
                'Change Management', 'Asset and Configuration Management', 'Service Desk', 'Performance Measurement'
            ],
            10 => [
                'Pengenalan Tata Kelola TI', 'Kerangka Kerja COBIT', 'IT Governance Principles', 'Risk Management', 'Compliance Management', 
                'IT Strategy Alignment', 'Value Delivery', 'Resource Management', 'Performance Measurement', 'Audit TI', 
                'Security Governance', 'Ethics in IT Governance', 'Policy Development', 'Maturity Assessment'
            ],
            11 => [
                'Pengenalan Keamanan Informasi', 'Ancaman dan Kerentanan', 'Kebijakan Keamanan', 'Kontrol Akses', 'Kriptografi', 
                'Keamanan Jaringan', 'Keamanan Aplikasi', 'Manajemen Insiden', 'Penilaian Risiko', 'Perencanaan Pemulihan Bencana', 
                'Audit Keamanan', 'Keamanan Cloud', 'Perlindungan Data Pribadi', 'Keamanan Fisik'
            ]
        ];

        // Loop through each materi_id
        foreach ($materiDetail as $materiId => $moduls) {
            foreach ($moduls as $modul) {
                DB::table('detail_materi')->insert([
                    'materi_id' => $materiId,
                    'modul' => $modul,
                    'isi_materi' => implode(' ', $faker->words(100)),  // Generates a random sentence
                ]);
            }
        }
    }
}
