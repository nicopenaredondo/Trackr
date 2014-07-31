<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{

		$userData = [
			'group_id' => 1,
			'username' => 'admin',
			'password' => Hash::make('password'),
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s')
		];
		$userId = DB::table('users')->insertGetId($userData);

		$userProfileData = [
			'user_id' 		=> $userId,
			'job_id'  		=> 1,
			'first_name'  => 'Administrator',
			'last_name'   => 'User',
			'birthday' 		=> '1993-06-05',
			'email' 			=> 'admin@gmail.com',
			'address'     => 'Cyberspace',
			'phone_number' => '123456789',
			'emergency_contact_number' 	=> '123456789',
			'emergency_contact_name' 		=> 'Administrator',
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s')
		];

		DB::table('user_profile')->insert($userProfileData);
	}

}
