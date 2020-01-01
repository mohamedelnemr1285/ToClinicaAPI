<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDoctorsTable extends Migration {

	public function up()
	{
		Schema::create('Doctors', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('name', 100);
			$table->text('image', 100);
			$table->text('nationality', 50);
			$table->decimal('price');
			$table->text('details');
			$table->integer('clinic_id')->unsigned();
			$table->integer('specialty_id')->unsigned();
			$table->integer('type_of_specialty_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Doctors');
	}
}