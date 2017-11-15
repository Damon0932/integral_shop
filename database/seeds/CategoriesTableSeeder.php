<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert(
            ['title' => '家庭常备','logo_url' => 'http://o8r5bg2z1.bkt.clouddn.com/%E5%AE%B6%E5%BA%AD%E5%B8%B8%E5%A4%87.png']);
    }
}
