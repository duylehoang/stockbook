<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Hoang Duy',
            'email' => 'duylehoang1802@gmail.com',
            'password' => Hash::make('stockbook'),
        ]);
    }
}
