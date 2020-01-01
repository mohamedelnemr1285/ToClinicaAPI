<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiscountsTable extends Migration {

	public function up()
	{
		Schema::create('Discounts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('link', 100);
			$table->decimal('percentage');
			$table->integer('duration');
			$table->string('discount_code');
			$table->string('discounted_type', 50);
			$table->integer('discounted_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Discounts');
	}
}