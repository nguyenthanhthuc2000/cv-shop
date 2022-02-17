<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('vi_VN');

        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {
            $name = $faker->sentence(5);
            $code = randomCode();
            $cat1 = array(5, 6, 7, 8, 9, 10);
            $cat2 = array(11, 12);
            DB::table('product')->insert([
                'user_id' => 1,
                'name' => $name,
                'slug' => slug($name).'-'.$code,
                'code' => $code,
                'price' => 1000000,
                'price_pro' => 800000,
                'photo' =>  $faker->image('public/uploads/product', 400, 300, null, false),
                'quantily' => 100,
                'quantily_sold' => 10,
                'content' => $faker->paragraph(10),
                'desc' => $faker->paragraph(1),
                'category1_id' => 6,
                'category2_id' => $cat2[array_rand($cat2)],
                'made_in' => 'Việt Nam',
                'mass' => '100 Gam',
                'status' => 1,
                'highlights' => 1,
                'seo_title' => $name,
                'seo_description' => $name,
                'seo_keywords' => $name,
            ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            $name = $faker->sentence(5);
            $code = randomCode();
            $cat1 = array(5, 7, 8, 9, 10);
            DB::table('product')->insert([
                'user_id' => 1,
                'name' => $name,
                'slug' => slug($name).'-'.$code,
                'code' => $code,
                'price' => 1000000,
                'price_pro' => 800000,
                'photo' =>  $faker->image('public/uploads/product', 400, 300, null, false),
                'quantily' => 100,
                'quantily_sold' => 10,
                'content' => $faker->paragraph(10),
                'desc' => $faker->paragraph(1),
                'category1_id' => $cat1[array_rand($cat1)],
                'made_in' => 'Việt Nam',
                'mass' => '100 Gam',
                'status' => 1,
                'highlights' => 1,
                'seo_title' => $name,
                'seo_description' => $name,
                'seo_keywords' => $name,
            ]);
        }
    }
}
