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
    public function  generateRandomDynatys(){
        $dynasty =rand(1, 25);
        return $dynasty;
    }
    public  function generateRandomLocation(){
        $location = [
            '中華民國國立故宮博物院',
            '埃及吉薩',
            '義大利托斯卡納省比薩城',
            '義大利羅馬市中心',
            '印度北方邦阿格拉',
            '北京故宮博物院',
            '日本京都府京都市左京區銀閣寺町2',
            '英格蘭東北部城市達勒姆',
            '德國不萊梅市',
            '於梵蒂岡宗座宮殿內的西斯汀小堂大廳天頂',
            '法國巴黎西南約70公里處的沙特爾市',
            '今印度尼西亞勿里洞島近1.6公里處沉沒',
            '日本東京國立博物館',
            '東京國立博物館、大英博物馆、法國國家圖書館、大都會博物館(等兩百多處)',
            '美國田納西州第二大城市納許維爾',
            '英國倫敦西敏市泰晤士河畔'
        ];
        return $location[rand(0, count($location)-1)];
    }
    public function  generateRandomLong(){
        $long =rand(1, 200);
        return $long;
    }
    public function  generateRandomWidth(){
        $width =rand(1, 200);
        return $width;
    }
    public function run()
    {
        for ($i=0; $i<100; $i++) {
            $name = $this->generateRandomName();
            $dynasty = $this->generateRandomDynatys();
            $location = $this->generateRandomLocation();
            $long = $this->generateRandomLong();
            $width = $this->generateRandomWidth();
            DB::table('antiques')->insert([
                'p_name' => $name,
                'dynasty_ID' => $dynasty,
                'location' => $location,
                'long' => $long,
                'width' => $width
            ]);
        }
    }
}
