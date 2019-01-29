<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
        });

        Schema::table('maps', function (Blueprint $table) {
            $table->foreign('mine_id')->references('id')->on('mines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maps', function (Blueprint $table) {
            $table->dropForeign('maps_mine_id_foreign');
        });
        Schema::dropIfExists('mines');
    }
}
