<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x=1;
        for ($i=1; $i<=500; $i++) {
            $now = Carbon::now()->subDays(29)->addSecond($i+600);
            if ($x > 5) {
                $x = 1;
            }
            DB::table('tests')->insert([
                'item_id' => random_int(1, 100),
//                'test_rig_name' => random_int(1, 5) . "A",
                'name' => 'Step: ' . $x,
                'error' => random_int(1, 5),
                'description' => 'desc. ' . Str::random(10),
                'outcome' => random_int(0, 1),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $x++;
        }
    }
}