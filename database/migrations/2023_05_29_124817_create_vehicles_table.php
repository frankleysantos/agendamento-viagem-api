<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

	public function up()
	{
		Schema::create('vehicles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('plate', 255)->unique();
			$table->string('year', 255);
			$table->string('cor', 255)->nullable();
			$table->integer('total_capacity');
			$table->longText('description')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('vehicles');
	}
};