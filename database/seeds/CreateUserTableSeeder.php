<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Pratyay Chakraborty',
        	'email' => 'pratyay@itobuz.com',
        	'password' =>Hash::make('pratyay@123')
        ]);

        User::create([
        	'name' => 'Palash Chanda',
        	'email' => 'palash@itobuz.com',
        	'password' => Hash::make('palash@123')
        ]);

        User::create([
        	'name' => 'Saikat  Mitra',
        	'email' => 'saikat@itobuz.com',
        	'password' => Hash::make('saikat@123')
        ]);
    }
}
