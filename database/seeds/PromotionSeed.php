<?php

use Illuminate\Database\Seeder;

class PromotionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
            'code'=>'XINCHAO',
            'value'=>50
        ]);

        DB::table('promotions')->insert([
            'code'=>'KHTT',
            'value'=>20
        ]);
    }
}
