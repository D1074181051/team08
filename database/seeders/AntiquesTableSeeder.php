<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AntiquesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('antiques')->insert([
            'p_name' => '翠玉白菜',
            'dynasty_ID' => '1',
            'location' => '中華民國國立故宮博物院',
            'long' => '0.181',
            'width' => '0.091'
        ]);

        DB::table('antiques')->insert([
            'p_name' => '紫檀多寶格方匣',
            'dynasty_ID' => '1',
            'location' => '中華民國國立故宮博物院',
            'long' => '0.252',
            'width' => '0.254'
        ]);

        DB::table('antiques')->insert([
            'p_name' => '碧玉金絲盤',
            'dynasty_ID' => '1',
            'location' => '中華民國國立故宮博物院',
            'long' => '0.019',
            'width' => '0.0024'
        ]);

        DB::table('antiques')->insert([
            'p_name' => '古夫金字塔',
            'dynasty_ID' => '2',
            'location' => '埃及吉薩',
            'long' => '138.8',
            'width' => '146.6'
        ]);

    }
}
