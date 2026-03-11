<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [];
        $param = [
            ['name' => '仕事'],
            ['name' => '家庭'],
            ['name' => '趣味'],
        ];
        DB::table('categories')->insert($param);
    }
}
