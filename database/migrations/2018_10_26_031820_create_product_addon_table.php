<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductAddonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_addon', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('product_id')->index('product_id');
			$table->integer('addon_product_id')->index('addon_product_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_addon');
	}

}
