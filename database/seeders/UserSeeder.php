<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Admin',
            'email' => 'nguyenthanhthuc.2k@gmail.com',
            'password' => Hash::make('123456'),
            'level' => 5
        ];
        DB::table('users')->insert($data);
    }
}
