<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antiques', function (Blueprint $table) {
            $table->id()->comment('編號');
            $table->string('p_name')->comment('古物');
            $table->foreignId('dynasty_ID')->comment('朝代編號');
            $table->string('location')->comment('收藏地(所在地)');
            $table->double('long')->unsigned()->comment('長(以公尺為標準)');
            $table->double('width')->unsigned()->comment('寬(以公尺為標準)');
            $table->foreign('dynasty_ID')->references('id')->on('dynastys')->onDelete('cascade');
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
        Schema::dropIfExists('antiques');
    }
}
