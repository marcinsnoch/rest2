<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i<=100; $i++) {
            $now = Carbon::now()->subDays(30)->addSecond($i+600);
            DB::table('items')->insert([
                'serial_number' => Str::uuid(),
                'product_number' => 'product no' . $i,
                'test_rig_name' => random_int(1, 5) . "A",
                'error' => random_int(1, 5),
                'description' => 'desc.' . Str::random(),
                'outcome' => random_int(0, 1),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
