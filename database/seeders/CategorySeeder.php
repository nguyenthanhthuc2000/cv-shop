<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Cây cảnh',
                'slug' => 'cay-canh',
                'status' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Hoa kiểng',
                'slug' => 'hoa-kieng',
                'status' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Chậu cảnh',
                'slug' => 'chau-canh',
                'status' => '1',
            ],
            [
                'id' => '4',
                'name' => 'Cây giống',
                'slug' => 'cay-giong',
                'status' => '1',
            ],
            [
                'id' => '5',
                'name' => 'Cá kiểng',
                'slug' => 'ca-kieng',
                'status' => '1',
            ]
        ];

        foreach ($data as $v) {
            DB::table('category')->insert($v);
        }
    }
}
