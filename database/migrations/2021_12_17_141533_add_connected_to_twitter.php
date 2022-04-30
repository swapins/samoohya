<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConnectedToTwitter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('twitters', function (Blueprint $table) {
            $table->boolean('connected')->nullable()->default(false);
            $table->text('avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('twitters', function (Blueprint $table) {
            $table->drop('connected');
            $table->drop('avatar');
        });
    }
}
