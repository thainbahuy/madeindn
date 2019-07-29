<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSubmitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_submit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('author_name',100);
            $table->string('author_email',100);
            $table->string('author_phone',20);
            $table->text('author_address');
            $table->text('content');
            $table->string('name',200);
            $table->text('image_link');
            $table->text('content_link');
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
        Schema::dropIfExists('project_submit');
    }
}
