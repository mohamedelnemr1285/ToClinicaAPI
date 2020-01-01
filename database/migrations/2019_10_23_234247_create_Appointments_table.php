<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentsTable extends Migration {

	public function up()
	{
		Schema::create('Appointments', function(Blueprint $table) {
			$table->increments('id');
			$table->string('week_day');
			$table->time('from_hour_to_hour');
		});
	}

	public function down()
	{
		Schema::drop('Appointments');
	}
}