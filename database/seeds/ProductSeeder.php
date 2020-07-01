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
        for($i = 0; $i < 5; $i++)
        {
            DB::table('products')->insert([
                'name' => 'DH-001',
                'old_price' => 250000,
                'new_price'=> 200000,
                'image'=>'public/image1.png',
                'description' => 'Đồng cá tính, dành cho cả nam và nữ',
                'category_id' => 1,
            ]);
        
            DB::table('products')->insert([
                'name' => 'DH-002',
                'old_price' => 450000,
                'new_price'=> 200000,
                'image'=>'public/image2.png',
                'description' => 'Đồng cá tính, dành cho cả nam và nữ',
                'category_id' => 2,
            ]);

            DB::table('products')->insert([
                'name' => 'DH-003',
                'old_price' => 450000,
                'new_price'=> 200000,
                'image'=>'public/image3.png',
                'description' => 'Đồng cá tính, dành cho cả nam và nữ',
                'category_id' => 3,
            ]);

            DB::table('products')->insert([
                'name' => 'DH-004',
                'old_price' => 350000,
                'new_price'=> 200000,
                'image'=>'public/image4.png',
                'description' => 'Đồng cá tính, dành cho cả nam và nữ',
                'category_id' => 4,
            ]);

            DB::table('products')->insert([
                'name' => 'DH-005',
                'old_price' => 600000,
                'new_price'=> 400000,
                'image'=>'public/image5.png',
                'description' => 'Đồng cá tính, dành cho cả nam và nữ',
                'category_id' => 5,
            ]);

            DB::table('products')->insert([
                'name' => 'DH-006',
                'old_price' => 150000,
                'new_price'=> 120000,
                'image'=>'public/image8.png',
                'description' => 'Đồng cá tính, dành cho cả nam và nữ',
                'category_id' => 6,
            ]);

            DB::table('products')->insert([
                'name' => 'DH-007',
                'old_price' => 300000,
                'new_price'=> 200000,
                'image'=>'public/image9.png',
                'description' => 'Đồng cá tính, dành cho cả nam và nữ',
                'category_id' => 7,
            ]);
        }
    }
}
