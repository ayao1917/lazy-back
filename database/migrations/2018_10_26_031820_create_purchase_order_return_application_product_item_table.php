<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseOrderReturnApplicationProductItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_order_return_application_product_item', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('purchase_order_return_application_product_id')->index('purchase_order_return_application_product_id');
			$table->integer('product_item_id')->nullable()->index('product_item_id');
			$table->string('product_item_name', 32);
			$table->smallInteger('quantity');
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
		Schema::drop('purchase_order_return_application_product_item');
	}

}
