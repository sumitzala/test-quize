<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
    		'Admin','Quiz'
    	];

        foreach ($roles as $key => $value) {
        	Role::create(['name' => $value]);
        }
    }
}
