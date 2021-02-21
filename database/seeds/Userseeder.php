<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role'=> 'admin',
            'firstName' => 'Jano',
            'lastName'=>'Banos',
            'email' => 'test@test.com',
            'phone' =>'12345',
            'image'=>'128874.jpg',
            'password' => Hash::make('password'),
        ]);
    }


  

 
}
