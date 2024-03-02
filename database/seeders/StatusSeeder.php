<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'title' => 'new',
        ]);
        DB::table('statuses')->insert([
            'title' => 'in_progress',
        ]);
        DB::table('statuses')->insert([
            'title' => 'completed',
        ]);
        DB::table('statuses')->insert([
            'title' => 'expired',
        ]);
    }
}
