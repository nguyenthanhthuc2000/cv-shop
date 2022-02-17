<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
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
                'type' => 'logo-header',
                'status' => 1,
            ],
            [
                'id' => '2',
                'type' => 'logo-footer',
                'status' => 1,
            ],
        ];

        foreach ($data as $v) {
            DB::table('image')->insert($v);
        }
    }
}
