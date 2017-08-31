<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->info('Deleting users records');
        DB::table('users')->delete();
        DB::table('posts')->delete();
        $this->call(User_seeder::class);
        $this->call(Post_seeder::class);

        Model::reguard();
    }
}
