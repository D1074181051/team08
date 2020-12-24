<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DynastysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public  function  generateRandomString($length = 10){
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .=$characters[rand(0,$charactersLength - 1)];
        }
        return $randomString;
    }
    public function  generateRandomName(){
        $first_name = $this->generateRandomString(rand(2, 15));
        $first_name = strtolower($first_name);
        $first_name = ucfirst($first_name);
        $last_name = $this->generateRandomString(rand(2, 15));
        $last_name = strtolower($last_name);
        $last_name = ucfirst($last_name);
        $name = $first_name . " ". $last_name;
        return $name;
    }
    public function  generateRandom_s_time(){
        $s_time =rand(1, 1000);
        return $s_time;
    }
    public function  generateRandom_e_time(){
        $e_time =rand(1001, 2000);
        return $e_time;
    }
    public  function generateRandomCapital(){
        $capital = [
            '赫圖阿拉',
            '遼陽',
            '奉天府',
            '順天府',
            '孟菲斯',
            '巴勒莫',
            '羅馬',
            '君士坦丁堡',
            '阿格拉',
            '法泰赫普爾西克里',
            '拉合爾',
            '德里',
            '汴梁',
            '臨安',
            '京都',
            '室町',
            '愛丁堡',
            '維特爾斯巴赫城堡',
            '無',
            '西法蘭克巴黎',
            '巴格達',
            '京都',
            '鎌倉',
            '江戶',
            '京都',
            '美國首都華盛頓',
            '英國倫敦'
        ];
        return $capital[rand(0, count($capital)-1)];
    }
    public function run()
    {
        for ($i=0; $i<30; $i++){
            $name = $this->generateRandomName();
            $s_time = $this->generateRandom_s_time();
            $e_time = $this->generateRandom_e_time();
            $capital = $this->generateRandomCapital();
            $random_datatime = Carbon::now()->subMinutes(rand(1, 55));

            DB::table('dynastys')->insert([
                't_name' => $name,
                's_time' => $s_time,
                'e_time' => $e_time,
                'capital' => $capital,
                'created_at' => $random_datatime,
                'updated_at' => $random_datatime
            ]);
        }
    }
}
