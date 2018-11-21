<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_item', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('product_id')->index('product_id');
			$table->integer('attached_id')->index('attached_id');
			$table->string('number', 32);
			$table->string('name', 32);
			$table->smallInteger('quantity');
			$table->smallInteger('item_quantity')->nullable();
			$table->boolean('status');
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->smallInteger('original_quantity');
			$table->string('int_bar_code', 13);
			$table->string('unit', 10);
			$table->string('type', 20);
			$table->integer('cost');
			$table->integer('price')->default(0);
			$table->integer('special_price')->default(0);
			$table->integer('weight');
			$table->integer('spec_length');
			$table->integer('spec_width');
			$table->integer('spec_height');
			$table->boolean('constant_temp');
			$table->boolean('fragile');
			$table->integer('official_general_quantity');
			$table->integer('vendor_general_quantity');
			$table->integer('official_qc_quantity');
			$table->integer('vendor_qc_quantity');
			$table->integer('official_defect_quantity');
			$table->integer('vendor_defect_quantity');
			$table->integer('official_today_quantity');
			$table->integer('vendor_today_quantity');
			$table->integer('official_stock_quantity');
			$table->integer('vendor_stock_quantity');
			$table->integer('safe_stock_quantity');
			$table->integer('replenishment_quantity');
			$table->integer('purchase_cost')->default(0);
			$table->integer('tally_cost')->default(0);
			$table->integer('processing_cost')->nullable()->default(0);
			$table->boolean('is_multi_item')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_item');
	}

}
