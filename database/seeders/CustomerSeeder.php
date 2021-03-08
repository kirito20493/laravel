<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->insert(
        [
            'name' => 'Hoang Thi Kim Anh',
            'email' => 'kimanh@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '0807998226',
            'address' => '175 Phan Xich Long - Da Nang',
        ]);
    }
}
