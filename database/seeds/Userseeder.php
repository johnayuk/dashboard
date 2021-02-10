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
            'name' => 'Admin',
            'lastName'=>'Admin',
            'email' => 'test@test.com',
            'phone' =>'12345',
            'specialization'=>'administration',
            'role'=> 'admin',
            'address'=>'LLt',
            'dateEmployed'=>'22jan',
            'image'=>'128874.jpg',
            'password' => Hash::make('password'),
        ]);
    }


  

 
}
