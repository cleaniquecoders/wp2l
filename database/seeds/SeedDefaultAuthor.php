<?php

use Illuminate\Database\Seeder;

class SeedDefaultAuthor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'     => config('wp2l.default_author_name'),
            'email'    => config('wp2l.default_author_email'),
            'password' => bcrypt(config('wp2l.default_author_password')),
        ])->assignRole([
        	'developer',
	        'administrator',
	        'user'
        ]);
    }
}
