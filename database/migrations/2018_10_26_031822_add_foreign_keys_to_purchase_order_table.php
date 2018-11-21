<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPurchaseOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('purchase_order', function(Blueprint $table)
		{
			$table->foreign('user_id', 'purchase_order_ibfk_1')->references('id')->on('user')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('purchase_order', function(Blueprint $table)
		{
			$table->dropForeign('purchase_order_ibfk_1');
		});
	}

}
