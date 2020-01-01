<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeOfSpecialtiesTable extends Migration {

	public function up()
	{
		Schema::create('Type_of_specialties', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('name');
			$table->string('color');
			$table->string('icon', 250);
		});
	}

	public function down()
	{
		Schema::drop('Type_of_specialties');
	}
}