<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('experience_type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('info')->nullable();
            $table->string('position')->nullable();
            $table->string('webpage')->nullable();
            $table->string('company')->nullable();
            $table->timestamps();
            $table->foreign('experience_type_id')->references('id')->on('experience_types');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
