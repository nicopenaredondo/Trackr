<?php

class DepartmentsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('departments')->truncate();
		$data = [
			'department_name' => 'Systems',
			'department_description' => 'Responsible for developing custom applications',
			'created_at' 				=> date('Y-m-d h:i:s'),
			'updated_at' 				=> date('Y-m-d h:i:s')
		];
		DB::table('departments')->insert($data);
	}

}
