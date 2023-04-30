<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestsDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i<=1000; $i++) {
            DB::table('test_details')->insert([
                'test_id' => random_int(1, 100),
                'name' => 'Step X',
                'error' => random_int(1, 5),
                'description' => Str::random(),
                'outcome' => random_int(0, 1),
            ]);
        }
    }
}