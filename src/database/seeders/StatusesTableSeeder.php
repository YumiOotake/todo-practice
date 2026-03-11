<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
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
            ['name' => '未着手'],
            ['name' => '進行中'],
            ['name' => '完了'],
        ];
        DB::table('statuses')->insert($param);
    }
}
