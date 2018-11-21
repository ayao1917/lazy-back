<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductRelateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_relate', function(Blueprint $table)
		{
			$table->foreign('product_id', 'product_relate_ibfk_1')->references('id')->on('product')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('relate_product_id', 'product_relate_ibfk_2')->references('id')->on('product')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_relate', function(Blueprint $table)
		{
			$table->dropForeign('product_relate_ibfk_1');
			$table->dropForeign('product_relate_ibfk_2');
		});
	}

}
