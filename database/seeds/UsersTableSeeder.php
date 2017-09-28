<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'email'         => 'admin@gmail.com',
                    'name'          => 'admin',
                    'password'      => bcrypt('123456'),
                    'phone'         => '01232085432',
                    'address'       => 'Ha Dong - Ha Noi',
                    'level_id'		=> '1',
                    'status'        => '1',
                ],

                [
                    'email'         => 'son@gmail.com',
                    'name'          => 'son',
                    'password'      => bcrypt('123456'),
                    'phone'         => '01232085432',
                    'address'       => 'Ha Dong - Ha Noi',
                    'level_id'		=> '2',
                    'status'        => '2',
                ]
            ]
        );
    }
}
