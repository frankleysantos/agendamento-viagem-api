<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

	public function up()
	{
		Schema::create('drivers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('telephone');
			$table->enum('cnh_category', array('A', 'B', 'AB', 'C', 'AC', 'D', 'AD', 'E', 'AE'));
			$table->string('cnh_number')->unique();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('drivers');
	}
};