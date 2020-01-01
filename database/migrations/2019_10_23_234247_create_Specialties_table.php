<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecialtiesTable extends Migration {

	public function up()
	{
		Schema::create('Specialties', function(Blueprint $table) {
			$table->increments('id');
			$table->text('name');
		});
	}

	public function down()
	{
		Schema::drop('Specialties');
	}
}