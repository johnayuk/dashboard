<?php

use Illuminate\Database\Seeder;

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
            'email' => 'test@test.com',
            'role'=>'admin',
            'phone' =>'12345',
            'image'=>'128874.jpg',
            'password' => Hash::make('password'),
        ]);
    }
}
