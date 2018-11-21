<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPageContentImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('page_content_image', function(Blueprint $table)
		{
			$table->foreign('page_id', 'page_content_image_ibfk_1')->references('id')->on('page')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('page_content_image', function(Blueprint $table)
		{
			$table->dropForeign('page_content_image_ibfk_1');
		});
	}

}
