<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseOrderExtraFeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_order_extra_fee', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('order_id')->index('order_id');
			$table->boolean('type')->default(0);
			$table->string('name', 128);
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
		Schema::drop('purchase_order_extra_fee');
	}

}
