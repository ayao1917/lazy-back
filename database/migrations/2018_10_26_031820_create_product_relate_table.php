<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductRelateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_relate', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('product_id')->index('product_id');
			$table->integer('relate_product_id')->index('relate_product_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_relate');
	}

}
