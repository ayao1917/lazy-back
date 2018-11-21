<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 128);
			$table->integer('product_subcategory_id')->nullable()->index('product_subcategory_id');
			$table->integer('discount_id')->nullable()->index('discount_id');
			$table->boolean('product_template');
			$table->text('description', 65535);
			$table->text('content');
			$table->text('marketing_wording', 65535);
			$table->string('photo', 128)->nullable();
			$table->smallInteger('sale_target')->default(0);
			$table->boolean('is_one_page')->default(0);
			$table->boolean('is_brand_website')->default(0);
			$table->boolean('is_published')->default(0);
			$table->boolean('status');
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->smallInteger('sale_rate');
			$table->smallInteger('quantity');
			$table->string('pageAlias', 30);
			$table->string('tag', 64);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product');
	}

}
