<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacebookGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_groups', function (Blueprint $table) {
            $table->id();
            $table->text('user_id');
            $table->longtext('token_id');
            $table->text('group_id');
            $table->longtext('group_token');
            $table->text('image');
            $table->text('name');
            $table->text('privacy'); 
            $table->text('provider');
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
        Schema::dropIfExists('facebook_groups');
    }
}
