<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClinicsTable extends Migration {

	public function up()
	{
		Schema::create('Clinics', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('name');
			$table->text('address');
			$table->text('image');
			$table->string('link', 100);
			$table->integer('city_id')->unsigned();
			$table->integer('specialty_id')->unsigned();
			$table->integer('type_of_specialty_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Clinics');
	}
}