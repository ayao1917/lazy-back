<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPurchaseOrderReturnApplicationProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('purchase_order_return_application_product', function(Blueprint $table)
		{
			$table->foreign('purchase_order_return_application_id', 'purchase_order_return_application_product_ibfk_1')->references('id')->on('purchase_order_return_application')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('product_id', 'purchase_order_return_application_product_ibfk_2')->references('id')->on('product')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('purchase_order_return_application_product', function(Blueprint $table)
		{
			$table->dropForeign('purchase_order_return_application_product_ibfk_1');
			$table->dropForeign('purchase_order_return_application_product_ibfk_2');
		});
	}

}
