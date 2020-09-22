<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        DB::table('products')->insert([
           'name' => Str::random(10),
            'description' => Str::random(100),
            'price' => 12000,
            'amount' => random_int(10, 30),
            'category' => Arr::random(['category 1', 'category 2', 'category 3'])
        ]);
    }
}
