<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynastysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynastys', function (Blueprint $table) {
            $table->id()->comment('編號');
            $table->string('t_name', 255)->comment('朝代');
            $table->integer('s_time')->comment('經歷時間(起)(西元)');
            $table->integer('e_time')->comment('經歷時間(迄)(西元)');
            $table->string('capital', 255)->comment('舊時首都');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dynastys');
    }
}
