<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('nickname');

			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('photourl');
			$table->string('nrcno');
			$table->string('fburl');	
			$table->string('ph1');
			$table->string('ph2');
			$table->string('address');
			$table->integer('roleid');
			$table->integer('balance');
			$table->string('kbzbankacc');
			$table->string('cbbankacc');
			$table->string('ayabankacc');
			$table->string('agdbankacc');
			$table->string('okdollor');
			$table->string('wavemoney');
			$table->string('truemoney');







			$table->rememberToken();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
