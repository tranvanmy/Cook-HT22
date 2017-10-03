<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
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
                    'level_id'         => '1',
                    'phone'         => '01232085432',
                    'address'       => 'Ha Dong',
                    'status' 		=> '1'
                ],

                [
                    'email'         => 'son@gmail.com',
                    'name'          => 'son',
                    'password'      => bcrypt('123456'),
                    'level_id'      => '2',
                    'phone'         => '113',
                    'address'       => 'Van Khe',
                    'status' 		=> '1'
                ]
            ]
        );
    }
}
