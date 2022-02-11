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
                'name' => 'Rao vặt',
                'slug' => 'rao-vat',
                'status' => '1',
                'level' => '0',
            ],
            [
                'id' => '2',
                'name' => 'Phụ kiện',
                'slug' => 'phu-kien',
                'status' => '1',
                'level' => '0',
            ],
            [
                'id' => '3',
                'name' => 'Hạt giống',
                'slug' => 'hat-giong',
                'status' => '1',
                'level' => '0',
            ],
            [
                'id' => '4',
                'name' => 'Cá giống',
                'slug' => 'ca-giong',
                'status' => '1',
                'level' => '0',
            ]
        ];

        foreach ($data as $v) {
            DB::table('category')->insert($v);
        }
    }
}
