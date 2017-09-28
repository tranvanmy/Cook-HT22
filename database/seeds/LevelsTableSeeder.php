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
        DB::table('levels')->delete();

        DB::table('levels')->insert(
            [
                [
                    'level'           => 'Admin',
                    'description'     => 'Quản trị'
                ],

                [
                    'level'           => 'User',
                    'description'     => 'Người dùng'
                ]
            ]
        );
    }
}
