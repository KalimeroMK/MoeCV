<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::defaultStringLength(191);
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('email')->nullable()->unique();
			$table->string('password');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('profile_photo')->nullable();
			$table->boolean('is_admin')->nullable();
			$table->string('primary_title')->nullable();
			$table->string('short_bio')->nullable();
			$table->integer('city_id')->unsigned()->nullable();
			$table->boolean('available_full_time')->nullable();
			$table->boolean('available_part_time')->nullable();
			$table->boolean('available_intern')->nullable();
			$table->string('job')->nullable();
			$table->string('degree')->nullable();
			$table->string('profile_header_text')->nullable();
			$table->string('color')->default('#FDC958')->nullable();
			$table->string('phone')->nullable();
			$table->timestamps();
			$table->foreign('city_id')->references('id')->on('cities');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
