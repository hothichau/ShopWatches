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
            'username' => 'admin',
            'password' => Hash::make('123'),
            'image'=>'public/anh.jpeg',
            'role'=>'admin',
             'phone' => '0395275440',
        ]);

        DB::table('users')->insert([
            'username' => 'user',
            'password' => Hash::make('123'),
            'image'=>'public/anh1.jpeg',
            'role'=>'user',
            'phone'=> '01678187624',
        ]);
    }
}
