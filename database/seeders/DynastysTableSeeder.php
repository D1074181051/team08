<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DynastysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dynastys')->insert([
            't_name' => '清朝',
            'vids' => '1616~1912',
            'capital' => '赫圖阿拉、遼陽、奉天府、順天府'
        ]);

        DB::table('dynastys')->insert([
            't_name' => '埃及第四王朝',
            'vids' => 'B.C.2613~B.C2494',
            'capital' => '孟菲斯'
        ]);

    }
}
