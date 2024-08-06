<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgresBelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // users_id 1
            ['users_id' => 1, 'materi_id' => 1],
            ['users_id' => 1, 'materi_id' => 2],
            ['users_id' => 1, 'materi_id' => 3],
            ['users_id' => 1, 'materi_id' => 4],
            ['users_id' => 1, 'materi_id' => 5],
            // users_id 4
            ['users_id' => 4, 'materi_id' => 1],
            ['users_id' => 4, 'materi_id' => 2],
            ['users_id' => 4, 'materi_id' => 3],
            ['users_id' => 4, 'materi_id' => 5],
            // users_id 5
            ['users_id' => 5, 'materi_id' => 2],
            ['users_id' => 5, 'materi_id' => 3],
            ['users_id' => 5, 'materi_id' => 4],
            // users_id 6
            ['users_id' => 6, 'materi_id' => 3],
            ['users_id' => 6, 'materi_id' => 4],
            // users_id 7
            ['users_id' => 7, 'materi_id' => 3],
            ['users_id' => 7, 'materi_id' => 4],
            // users_id 8
            ['users_id' => 8, 'materi_id' => 1],
            ['users_id' => 8, 'materi_id' => 2],
            // users_id 9
            ['users_id' => 9, 'materi_id' => 1],
            ['users_id' => 9, 'materi_id' => 8],
            ['users_id' => 9, 'materi_id' => 9],
            ['users_id' => 9, 'materi_id' => 10],
            // users_id 10
            ['users_id' => 10, 'materi_id' => 1],
            ['users_id' => 10, 'materi_id' => 3],
            ['users_id' => 10, 'materi_id' => 7],
            ['users_id' => 10, 'materi_id' => 9],
            // users_id 11
            ['users_id' => 11, 'materi_id' => 1],
            ['users_id' => 11, 'materi_id' => 3],
            ['users_id' => 11, 'materi_id' => 11],
            // users_id 12
            ['users_id' => 12, 'materi_id' => 3],
            ['users_id' => 12, 'materi_id' => 9],
            ['users_id' => 12, 'materi_id' => 10],
            // users_id 13
            ['users_id' => 13, 'materi_id' => 10],
            ['users_id' => 13, 'materi_id' => 11],
            // users_id 14
            ['users_id' => 14, 'materi_id' => 3],
            ['users_id' => 14, 'materi_id' => 4],
            ['users_id' => 14, 'materi_id' => 5],
            ['users_id' => 14, 'materi_id' => 7],
            ['users_id' => 14, 'materi_id' => 8],
        ];

        foreach ($data as $entry) {
            DB::table('progres_belajar')->insert([
                'users_id' => $entry['users_id'],
                'materi_id' => $entry['materi_id'],
                'progres' => 0,
            ]);
        }
    }
}