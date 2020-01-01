<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateADSTable extends Migration {

	public function up()
	{
		Schema::create('ADS', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->date('expire_at');
			$table->integer('clinic_id')->unsigned();
			$table->integer('doctor_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('ADS');
	}
}