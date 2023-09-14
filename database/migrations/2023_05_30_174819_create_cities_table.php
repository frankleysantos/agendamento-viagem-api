<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

	public function up()
	{
		Schema::create('cities', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('state_id')->unsigned();
			$table->string('name');
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('state_id')->references('id')->on('states')
						->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('cities');
	}
};