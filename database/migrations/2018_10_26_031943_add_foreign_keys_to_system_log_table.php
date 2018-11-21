<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSystemLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('system_log', function(Blueprint $table)
		{
			$table->foreign('admin_id', 'system_log_ibfk_1')->references('id')->on('admin')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('system_log', function(Blueprint $table)
		{
			$table->dropForeign('system_log_ibfk_1');
		});
	}

}
