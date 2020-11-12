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
            'phone' =>'12345',
            'password' => Hash::make('password'),
        ]);
    }
}
