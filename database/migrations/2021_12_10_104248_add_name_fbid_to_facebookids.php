<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameFbidToFacebookids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facebook_i_d_s', function (Blueprint $table) {
            $table->text('fid')->nullable();
            $table->text('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facebook_i_d_s', function (Blueprint $table) {
            $table->drop('fid');
            $table->drop('name');
        });
    }
}
