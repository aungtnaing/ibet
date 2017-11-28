<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('name');

			$table->integer('userid');
			
			$table->integer('hometeamid')->unsigned();
			$table->integer('awayteamid')->unsigned();

			$table->integer('upperteamid')->unsigned();
			$table->integer('lowerteamid')->unsigned();

		
			$table->string('result');
			$table->string('winteam');	
			
			$table->boolean('active');
			$table->integer('mainslideid');

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
		Schema::drop('bets');
	}

}
