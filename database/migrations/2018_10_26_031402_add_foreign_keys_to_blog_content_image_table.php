<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBlogContentImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('blog_content_image', function(Blueprint $table)
		{
			$table->foreign('blog_id', 'blog_content_image_ibfk_1')->references('id')->on('blog')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('blog_content_image', function(Blueprint $table)
		{
			$table->dropForeign('blog_content_image_ibfk_1');
		});
	}

}
