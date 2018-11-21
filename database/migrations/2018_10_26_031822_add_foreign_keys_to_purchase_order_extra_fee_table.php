<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPurchaseOrderExtraFeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('purchase_order_extra_fee', function(Blueprint $table)
		{
			$table->foreign('order_id', 'extra_fee_ibfk_1')->references('id')->on('purchase_order')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('purchase_order_extra_fee', function(Blueprint $table)
		{
			$table->dropForeign('extra_fee_ibfk_1');
		});
	}

}
