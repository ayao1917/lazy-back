<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductSubcategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_subcategory', function(Blueprint $table)
		{
			$table->foreign('product_category_id', 'product_subcategory_ibfk_1')->references('id')->on('product_category')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_subcategory', function(Blueprint $table)
		{
			$table->dropForeign('product_subcategory_ibfk_1');
		});
	}

}
