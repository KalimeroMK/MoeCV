<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialNetworksUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_networks_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('social_network_id')->unsigned();
            $table->string('url');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('social_network_id')->references('id')->on('social_networks')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['user_id', 'social_network_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_networks_users');
    }
}
