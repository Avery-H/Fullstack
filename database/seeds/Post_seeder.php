<?php

use Illuminate\Database\Seeder;

class Post_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    for($i = 0; $i <=15; $i++){
    	$post1 = new App\Post();
    	$post1->title = 'fakie'.$i;
    	$post1->url = 'fake'.$i;
    	$post1->content = 'if I was a pickle, I dont really know i wouldnt be alive.' . $i;
    	$post1->user_id = $i;
    	$post1->save();
}
    }
}
