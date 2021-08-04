<?php

use Illuminate\Database\Seeder;

class user_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ari Maulana',
            'email' => 'ari@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('123'),
            'balance' => '2975000'
        ]);
    }
}
