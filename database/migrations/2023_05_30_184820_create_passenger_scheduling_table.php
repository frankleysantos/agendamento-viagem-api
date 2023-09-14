<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

	public function up()
	{
		Schema::create('passenger_scheduling', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('scheduled_trips_id')->unsigned();
			$table->integer('passenger_id')->unsigned();
			$table->enum('status', array('solicitado', 'marcado', 'cancelado'));
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('scheduled_trips_id')->references('id')->on('scheduled_trips')
						->onDelete('no action')
						->onUpdate('no action');

			$table->foreign('passenger_id')->references('id')->on('passengers')
						->onDelete('no action')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::drop('passenger_scheduling');
	}
};