<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseOrderProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_order_product', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('purchase_order_id')->index('purchase_order_id');
			$table->integer('product_id')->nullable()->index('product_id');
			$table->string('product_name', 128);
			$table->integer('price')->default(0);
			$table->integer('special_price')->default(0);
			$table->integer('fee');
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
		Schema::drop('purchase_order_product');
	}

}
