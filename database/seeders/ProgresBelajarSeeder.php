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
        //
        DB::table('progres_belajar')->insert([
            [
                // id 1
                'users_id' => 1,
                'materi_id' => 1,
                'progres' => 0,
            ],
            [
                // id 1
                'users_id' => 4,
                'materi_id' => 1,
                'progres' => 0,
            ],
        ]);
    }
}
