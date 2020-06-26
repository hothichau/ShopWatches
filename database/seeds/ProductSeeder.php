<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        for($i = 0; $i < 10; $i++)
        {
            DB::table('products')->insert([
                'name' => 'Đồng hồ Aviator',
                'old_price' => 250000,
                'new_price'=> 200000,
                'image'=>'public/image1.png',
                'description' => 'Đồng cá tính, dành cho cả nam và nữ',
                'category_id' => 3,
            ]);
        }
    }
}
