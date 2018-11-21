<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('product_id')->nullable()->index('product_id');
			$table->string('title', 128);
			$table->text('content');
			$table->string('author', 32);
			$table->date('publish_date')->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('blog');
	}

}
