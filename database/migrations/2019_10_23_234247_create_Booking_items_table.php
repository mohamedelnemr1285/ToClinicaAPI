<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingItemsTable extends Migration {

	public function up()
	{
		Schema::create('Booking_items', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('service_id')->unsigned();
			$table->integer('booking_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Booking_items');
	}
}