<?php

class DepartmentsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('departments')->truncate();
		$data = [
			'department_name' => 'Systems',
			'department_description' => 'Responsible for developing custom applications'
		];
		DB::table('departments')->insert($data);
	}

}
