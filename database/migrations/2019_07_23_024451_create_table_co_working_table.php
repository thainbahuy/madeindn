<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCoWorkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Co_working', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255);
            $table->text('image_link');
            $table->text('overview');
            $table->string('location',255);
            $table->string('jp_name',255);
            $table->text('jp_overview');
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
        Schema::dropIfExists('Co_working');
    }
}
