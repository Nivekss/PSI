<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		DB::table('posts')->truncate();
		DB::table('posts')->insert(
		    array(
		    	'id' 			    =>	1,
                'body'              => 'none',
		    	'project_id' 		=>	1,
		    	'user_id'			=>	1,
		    	)
		);

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}