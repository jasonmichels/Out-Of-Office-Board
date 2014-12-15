<?php


class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert(
            array(
                array(
                    'email' => 'michelsja@icloud.com',
                    'password' => Hash::make('admin'),
                    'name' => 'Jason MichelsAdmin',
                    'active' => 1,
                    'is_admin' => 1
                )
            )
        );
    }

}