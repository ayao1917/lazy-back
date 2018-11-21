<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductContentImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_content_image', function(Blueprint $table)
		{
			$table->foreign('product_id', 'product_content_image_ibfk_1')->references('id')->on('product')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_content_image', function(Blueprint $table)
		{
			$table->dropForeign('product_content_image_ibfk_1');
		});
	}

}
