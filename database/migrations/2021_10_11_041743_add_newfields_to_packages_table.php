<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewfieldsToPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->integer('accounts_no')->nullable();
            $table->integer('no_of_users')->nullable();
            $table->integer('no_of_clients')->nullable();
            $table->boolean('White_Label')->nullable();
            $table->integer('Feeds')->nullable();
            $table->boolean('Analytics')->nullable();
            $table->boolean('Inbox')->nullable();
            $table->boolean('Content_Calendar')->nullable();
            $table->boolean('Bulk_Scheduling')->nullable();
            $table->boolean('Curated_Content')->nullable();
            $table->boolean('Facebook_Ads')->nullable();
            $table->boolean('Concierge_Setup')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            //
        });
    }
}
