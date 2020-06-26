<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=>'Aviator',
        ]);

        DB::table('categories')->insert([
            'name'=>'G-Shock',
        ]);

        DB::table('categories')->insert([
            'name'=>'Baby-G',
        ]);

        DB::table('categories')->insert([
            'name'=>'Edifice',
        ]);

        DB::table('categories')->insert([
            'name'=>'G-Steel',
        ]);

        DB::table('categories')->insert([
            'name'=>'Gravity Master',
        ]);

        DB::table('categories')->insert([
            'name'=>'Mudmaster',
        ]);
    }
}
