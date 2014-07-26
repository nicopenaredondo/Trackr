<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('project_id');
			$table->string('project_name', 64);
			$table->string('project_contact_person', 128);
			$table->string('project_contact_number', 32);
			$table->string('email_address', 64);
			$table->dateTime('date_initiated');
			$table->dateTime('date_ended');
			$table->enum('project_status', ['Development', 'Escalation', 'Deployed'])->default('Development');
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
		Schema::drop('projects');
	}

}
