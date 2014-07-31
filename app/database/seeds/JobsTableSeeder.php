<?php


class JobsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('jobs')->truncate();
		$data = [
			'department_id' 		=> 1,
			'job_name'				 	=> 'Systems Engineer',
			'job_description' 	=> 'Responsible for developing custom applications',
			'created_at' 				=> date('Y-m-d h:i:s'),
			'updated_at' 				=> date('Y-m-d h:i:s')
		];
		DB::table('jobs')->insert($data);
	}

}
