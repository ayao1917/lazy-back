<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSystemLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('system_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('admin_id')->nullable()->index('admin_id');
			$table->string('table_class', 32);
			$table->integer('foreign_id');
			$table->boolean('type')->default(0);
			$table->text('message', 65535);
			$table->boolean('is_resolved')->default(0);
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
		Schema::drop('system_log');
	}

}
