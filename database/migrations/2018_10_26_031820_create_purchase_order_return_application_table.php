<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseOrderReturnApplicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_order_return_application', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('purchase_order_id')->index('purchase_order_id');
			$table->integer('user_id')->nullable()->index('user_id');
			$table->integer('purchase_order_replacement_id')->nullable()->index('purchase_order_return_id');
			$table->boolean('type');
			$table->string('number', 32);
			$table->string('fb_name', 32);
			$table->text('reason', 65535);
			$table->string('bank_name', 32);
			$table->string('bank_branch', 32);
			$table->string('bank_account', 32);
			$table->string('account_name', 32);
			$table->text('bank_info', 65535);
			$table->string('photo', 128)->nullable();
			$table->integer('fee');
			$table->string('recipient_name', 32);
			$table->string('recipient_phone', 32);
			$table->string('recipient_city', 32)->nullable();
			$table->string('recipient_region', 32)->nullable();
			$table->string('recipient_address', 128);
			$table->string('delivery_number', 32);
			$table->boolean('invoice_action')->default(0);
			$table->integer('debit_fee');
			$table->text('debit_reason', 65535);
			$table->boolean('is_modify_info')->default(1);
			$table->boolean('status');
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
		Schema::drop('purchase_order_return_application');
	}

}
