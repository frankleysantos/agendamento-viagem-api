<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

	public function up()
	{
		Schema::create('scheduled_trips', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('vehicle_id')->unsigned();
			$table->integer('destination_city_id')->unsigned();
			$table->integer('driver_id')->unsigned();
			$table->date('travel_date');
			$table->time('departure_time');
			$table->enum('status', array('agendado', 'concluido', 'cancelado'));
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('vehicle_id')->references('id')->on('vehicles')
						->onDelete('cascade');

			$table->foreign('destination_city_id')->references('id')->on('cities')
						->onDelete('cascade');

			$table->foreign('driver_id')->references('id')->on('drivers')
						->onDelete('no action')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::drop('scheduled_trips');
	}
};