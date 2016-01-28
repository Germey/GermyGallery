<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memories', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->integer('happiness');
            $table->date('date');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('memories');
	}

}
