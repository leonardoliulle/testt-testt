<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportsViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('reportsviews')->insert([
                'httplink' => 'http://example.com/' . Str::random(10),
                'name' => Str::random(10),
                'description' => Str::random(20),
                'alias' => Str::random(10),
                'pass' => Str::random(10),
                'group' => Str::random(10),
            ]);
            DB::table('reportsviews')->insert([
                'httplink' => 'http://example.com/' . Str::random(10),
                'name' => Str::random(10),
                'description' => Str::random(20),
                'alias' => Str::random(10),
                'pass' => Str::random(10),
                'group' => Str::random(10),
            ]);
        }
    }
}
