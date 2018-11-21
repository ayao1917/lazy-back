<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToItemQuantityMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('item_quantity_map', function(Blueprint $table)
		{
			$table->foreign('group_id', 'item_quantity_map_ibfk_1')->references('id')->on('item_quantity_group')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('item_id', 'item_quantity_map_ibfk_2')->references('id')->on('product_item')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('item_quantity_map', function(Blueprint $table)
		{
			$table->dropForeign('item_quantity_map_ibfk_1');
			$table->dropForeign('item_quantity_map_ibfk_2');
		});
	}

}
