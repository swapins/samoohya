<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewToPinterest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pinterests', function (Blueprint $table) {
           
            $table->text("Pinterest_id")->nullable();
            $table->text("profile_image")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pinterests', function (Blueprint $table) {
            $table->drop("Pinterest_id")->nullable();
            $table->drop("profile_image")->nullable();
        });
    }
}
