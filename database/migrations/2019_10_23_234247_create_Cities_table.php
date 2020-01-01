<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitiesTable extends Migration {

	public function up()
	{
		Schema::create('Cities', function(Blueprint $table) {
			$table->increments('id');
			$table->text('name');
		});
	}

	public function down()
	{
		Schema::drop('Cities');
	}
}