<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToItemQuantityGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('item_quantity_group', function(Blueprint $table)
		{
			$table->foreign('parent_id', 'item_quantity_group_ibfk_1')->references('id')->on('product_item')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('item_quantity_group', function(Blueprint $table)
		{
			$table->dropForeign('item_quantity_group_ibfk_1');
		});
	}

}
