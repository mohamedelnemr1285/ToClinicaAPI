<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingsTable extends Migration {

	public function up()
	{
		Schema::create('Bookings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->enum('status', array('active', 'completed'));
			$table->string('appointment');
			$table->decimal('price');
			$table->decimal('discounted_price');
			$table->string('service_id');
			$table->integer('discount_id')->unsigned();
			$table->integer('patient_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Bookings');
	}
}