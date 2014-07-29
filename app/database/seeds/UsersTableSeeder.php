<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{

		$userData = [
			'group_id' => 1,
			'username' => 'nicopenaredondo',
			'password' => Hash::make('niconico')
		];
		$userId = DB::table('users')->insertGetId($userData);

		$userProfileData = [
			'user_id' 		=> $userId,
			'job_id'  		=> 1,
			'first_name'  => 'Nico',
			'last_name'   => 'Penaredondo',
			'birthday' 		=> '1993-06-05',
			'email' 			=> 'nico.penaredondo@gmail.com',
			'address'     => '#4 Pluto St. Sto Nino Phase 2 Meycauayan City Bulacan',
			'phone_number' => '09264746458',
			'emergency_contact_number' 	=> '09264746458',
			'emergency_contact_name' 		=> 'Liza Penaredondo'
		];

		DB::table('user_profile')->insert($userProfileData);
	}

}
