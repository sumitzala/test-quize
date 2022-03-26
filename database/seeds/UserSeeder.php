<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
        	[
	        	'name' => 'admin',
	        	'email' => 'admin@admin.com',
	        	'password' => 'Admin',
	        	'role'     => 'Admin',
        	],
        	[
	        	'name' => 'test Quizer',
	        	'email' => 'test@test.com',
	        	'password' => 'Test',
	        	'role'     => 'Quiz'
        	]
        ];
        foreach ($user as $key => $value) {
        	$user           = new User();
        	$user->name     = $value['name'];
        	$user->email     = $value['email'];
        	$user->password  = Hash::make($value['password']);
        	if($user->save())
        	{
        		$user->assignRole($value['role']);
        	}
        }
        
    }
}
