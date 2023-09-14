<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

	public function up()
	{
		Schema::create('passengers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('telephone')->nullable();
			$table->string('email')->nullable();
			$table->string('cpf')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('passengers');
	}
};