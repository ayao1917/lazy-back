<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPurchaseOrderProductItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('purchase_order_product_item', function(Blueprint $table)
		{
			$table->foreign('purchase_order_product_id', 'purchase_order_product_item_ibfk_1')->references('id')->on('purchase_order_product')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('product_item_id', 'purchase_order_product_item_ibfk_2')->references('id')->on('product_item')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('purchase_order_product_item', function(Blueprint $table)
		{
			$table->dropForeign('purchase_order_product_item_ibfk_1');
			$table->dropForeign('purchase_order_product_item_ibfk_2');
		});
	}

}
