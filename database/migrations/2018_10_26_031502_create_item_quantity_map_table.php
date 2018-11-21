<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemQuantityMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_quantity_map', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('group_id')->index('group_id');
			$table->integer('item_id')->index('item_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item_quantity_map');
	}

}
