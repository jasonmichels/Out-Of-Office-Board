<?php


class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert(
            array(
                array(
                    'email' => 'jason@bikefree.tv',
                    'password' => Hash::make('admin'),
                    'name' => 'Jason MichelsAdmin',
                    'domain' => 'oooboard.com',
                    'domain_owner' => 1,
                    'active' => 1,
                    'is_admin' => 1
                )
            )
        );
    }

}