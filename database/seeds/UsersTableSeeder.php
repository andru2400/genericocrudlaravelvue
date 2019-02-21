<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
    	User::create([
          'name'  => 'Andres',
          'email' => 'andres@hotmail.com',
          'password' => bcrypt('123456')
    	]);
    }
}
