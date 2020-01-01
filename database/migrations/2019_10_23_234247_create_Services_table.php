<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration {

	public function up()
	{
		Schema::create('Services', function(Blueprint $table) {
			$table->increments('id');
			$table->string('service_name_id', 100);
			$table->string('details', 200);
			$table->decimal('price');
			$table->decimal('price_subtract');
			$table->integer('doctor_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Services');
	}
}