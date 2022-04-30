<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkedInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linked_ins', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->boolean('connected')->nullable()->default(false);
            $table->longText('token')->nullable();
            $table->longText('refreshToken')->nullable();
            $table->text('expiresIn')->nullable();
            $table->text('linkedin_id')->nullable();
            $table->text('nickname')->nullable();
            $table->text('name')->nullable();
            $table->text('email')->nullable();
            $table->text('avatar')->nullable();
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
        Schema::dropIfExists('linked_ins');
    }
}
