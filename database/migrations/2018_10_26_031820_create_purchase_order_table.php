<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_order', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->nullable()->index('user_id');
			$table->integer('purchase_order_id')->nullable();
			$table->string('number', 32);
			$table->string('recipient_name', 32);
			$table->boolean('recipient_gender');
			$table->string('recipient_phone', 32);
			$table->string('recipient_city', 32)->nullable();
			$table->string('recipient_region', 32)->nullable();
			$table->string('recipient_address', 128);
			$table->boolean('pay_method');
			$table->integer('fee');
			$table->string('email', 128);
			$table->string('vat_number', 32);
			$table->text('remark', 65535);
			$table->text('service_remark', 65535);
			$table->string('pay_remark', 20)->nullable();
			$table->text('returns_reason', 65535);
			$table->string('invoice_number', 32);
			$table->smallInteger('invoice_status')->default(100);
			$table->dateTime('invoice_date')->nullable();
			$table->string('delivery_number', 32);
			$table->smallInteger('status');
			$table->boolean('pay_status');
			$table->dateTime('created')->nullable();
			$table->dateTime('modified')->nullable();
			$table->text('system_remark', 65535);
			$table->string('batch_number', 32);
			$table->integer('shipping_cost')->default(0);
			$table->integer('reverse_logistics_cost')->default(0);
			$table->string('shop_rid')->nullable();
			$table->string('shop_click_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchase_order');
	}

}
