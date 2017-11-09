<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquiryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enquiry', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('age');
			$table->string('mumname');
			$table->string('fatname');
			$table->string('photourl1');
			$table->string('parentocc');
			$table->string('address');
			$table->string('phone');
			$table->string('email');
			$table->string('highestedu');
			$table->string('nameofschool');
			$table->string('ourschool');			
			$table->string('totalmarks');
			$table->string('english');
			$table->string('physics');
			$table->string('biology');
			$table->string('mathematics');
			$table->string('chemistry');
			$table->string('myanmar');
			$table->string('others');

		
			$table->string('igcseolevelmarks');
			$table->string('igcseenglish');
			$table->string('igcsemaths');
			$table->string('igcsechemistry');
			$table->string('igcsepuremaths');
			$table->string('igcsephysics');
			$table->string('igcsebiology');
			$table->string('igcseothers');
			$table->string('igcseprograminterested');



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
		Schema::drop('enquiry');
	}

}
