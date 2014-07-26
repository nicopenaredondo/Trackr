<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profile', function(Blueprint $table)
		{
			$table->increments('user_profile_id');
			$table->integer('user_id');
			$table->integer('department_id');
			$table->integer('job_id');
			$table->string('first_name', 64);
			$table->string('last_name', 64);
			$table->date('birthday');
			$table->string('email', 64);
			$table->text('address');
			$table->string('phone_number', 32);
			$table->string('emergency_contact_number', 32);
			$table->string('emergency_contact_name', 64);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_profile');
	}

}
