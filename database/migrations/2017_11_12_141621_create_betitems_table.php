<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetitemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('betitems', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('bettype');
			$table->string('bet');

			$table->integer('userid');
			
			$table->integer('betid')->unsigned();
			
			$table->integer('dateid')->unsigned();

		
			$table->integer('amount');
			$table->integer('balance');	

			$table->string('result');

			$table->boolean('active');
			

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
		Schema::drop('betitems');
	}

}
