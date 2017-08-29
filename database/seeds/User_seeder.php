<?php

use Illuminate\Database\Seeder;

class User_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    for($i = 0; $i <=15; $i++){
    	$user1 = new App\User();
    	$user1->email = 'fakie'.$i.'@codeup.com';
    	$user1->name = 'fake'.$i;
    	$user1->password = Hash::make('password123');
    	$user1->save();
}
    }
}
