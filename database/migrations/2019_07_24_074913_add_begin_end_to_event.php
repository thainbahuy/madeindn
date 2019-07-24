<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBeginEndToEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Event', function (Blueprint $table) {
            $table->string('jp_location', 255);
            $table->dateTime('begin_time');
            $table->dateTime('end_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Event', function (Blueprint $table) {
            $table->dropColumn('jp_location');
            $table->dropColumn('begin_time');
            $table->dropColumn('end_time');
        });
    }
}
