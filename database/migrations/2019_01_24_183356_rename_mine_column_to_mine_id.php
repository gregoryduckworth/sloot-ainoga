<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameMineColumnToMineId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maps', function (Blueprint $table) {
            $table->integer('mine')->unsigned()->change();
            $table->timestamps();
        });

        Schema::table('maps', function (Blueprint $table) {
            $table->renameColumn('mine', 'mine_id');
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
            $table->dropColumn(['updated_at', 'created_at']);
            $table->renameColumn('mine_id', 'mine');
        });
    }
}
