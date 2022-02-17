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
            ],
            [
                'id' => '5',
                'name' => 'Chậu hoa',
                'slug' => 'chau-hoa',
                'status' => '1',
                'level' => '1',
                'parent_id' => '2',
            ],
            [
                'id' => '6',
                'name' => 'Phụ kiện bể cá',
                'slug' => 'phu-kien-be-ca',
                'status' => '1',
                'level' => '1',
                'parent_id' => '2',
            ],
            [
                'id' => '7',
                'name' => 'Hạt cây cảnh',
                'slug' => 'hat-cay-canh',
                'status' => '1',
                'level' => '1',
                'parent_id' => '3',
            ],
            [
                'id' => '8',
                'name' => 'Cây thủy sinh',
                'slug' => 'cay-thuy-sinh',
                'status' => '1',
                'level' => '1',
                'parent_id' => '3',
            ],
            [
                'id' => '9',
                'name' => 'Cá loại nhỏ',
                'slug' => 'ca-loai-nho',
                'status' => '1',
                'level' => '1',
                'parent_id' => '4',
            ],
            [
                'id' => '10',
                'name' => 'Cá loại lớn',
                'slug' => 'ca-loai-lon',
                'status' => '1',
                'level' => '1',
                'parent_id' => '4',
            ],
            [
                'id' => '11',
                'name' => 'Máy tạo oxi',
                'slug' => 'may-tao-oxi',
                'status' => '1',
                'level' => '2',
                'parent_id' => '6',
            ],
            [
                'id' => '12',
                'name' => 'Đèn bể cá cảnh',
                'slug' => 'den-be-ca-canh',
                'status' => '1',
                'level' => '2',
                'parent_id' => '6',
            ],
        ];

        foreach ($data as $v) {
            DB::table('category')->insert($v);
        }
    }
}
