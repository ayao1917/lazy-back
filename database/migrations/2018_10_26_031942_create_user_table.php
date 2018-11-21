<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('username', 128)->unique('username');
			$table->string('password', 256);
			$table->string('name', 32);
			$table->string('phone', 32);
			$table->string('city', 32)->nullable();
			$table->string('region', 32)->nullable();
			$table->string('address', 128);
			$table->string('email', 128);
			$table->date('birthday')->nullable();
			$table->boolean('gender');
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
