<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductAttachedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_attached', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('product_id')->index('product_id');
			$table->string('name', 128);
			$table->text('description', 65535);
			$table->text('marketing_wording', 65535);
			$table->string('photo', 128)->nullable();
			$table->integer('price')->default(0);
			$table->smallInteger('sale_target')->default(0);
			$table->smallInteger('sale_rate');
			$table->smallInteger('quantity');
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
		Schema::drop('product_attached');
	}

}
