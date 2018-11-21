<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product', function(Blueprint $table)
		{
			$table->foreign('product_subcategory_id', 'product_ibfk_1')->references('id')->on('product_subcategory')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('discount_id', 'product_ibfk_2')->references('id')->on('discount')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product', function(Blueprint $table)
		{
			$table->dropForeign('product_ibfk_1');
			$table->dropForeign('product_ibfk_2');
		});
	}

}
