<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	public function up()
	{
		Schema::create('Patients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('name');
			$table->text('title');
			$table->string('mobile', 20);
			$table->string('email', 50);
			$table->text('address');
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Patients');
	}
}