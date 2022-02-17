<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voucher')->insert([
            ['name' => 'Giảm 100k', 'code' => '100k', 'type' => 0, 'number' => 100000, 'status' => 1],
            ['name' => 'Giảm 10%', 'code' => '10pt', 'type' => 1, 'number' => 10, 'status' => 1],
        ]);
    }
}
