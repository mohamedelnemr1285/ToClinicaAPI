<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvertisementsTable extends Migration {

	public function up()
	{
		Schema::create('Advertisements', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('image');
			$table->integer('duration');
			$table->integer('discount_id')->unsigned();
			$table->integer('clinic_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Advertisements');
	}
}