<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInstaToFacebookPage extends Migration
{
    /**
     * Run the migrations.
     * c swapin vidya
     * @return void
     */
    public function up()
    {
        Schema::table('facebook_pages', function (Blueprint $table) {
            $table->boolean('present')->nullable()->default(false);
            $table->boolean('connected')->nullable()->default(false);
            $table->longText('profile_picture_url')->nullable();
            $table->longText('instagarm_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facebook_pages', function (Blueprint $table) {
            $table->drop('present');
            $table->drop('connected');
            $table->drop('profile_picture_url');
            $table->drop('instagarm_id');
        });
    }
}
