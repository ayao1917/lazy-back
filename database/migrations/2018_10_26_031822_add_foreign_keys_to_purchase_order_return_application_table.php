<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPurchaseOrderReturnApplicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('purchase_order_return_application', function(Blueprint $table)
		{
			$table->foreign('purchase_order_id', 'purchase_order_return_application_ibfk_1')->references('id')->on('purchase_order')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'purchase_order_return_application_ibfk_2')->references('id')->on('user')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('purchase_order_replacement_id', 'purchase_order_return_application_ibfk_3')->references('id')->on('purchase_order')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('purchase_order_return_application', function(Blueprint $table)
		{
			$table->dropForeign('purchase_order_return_application_ibfk_1');
			$table->dropForeign('purchase_order_return_application_ibfk_2');
			$table->dropForeign('purchase_order_return_application_ibfk_3');
		});
	}

}
