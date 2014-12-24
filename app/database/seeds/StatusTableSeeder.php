<?php


class StatusTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('statuses')->delete();

        DB::table('statuses')->insert(
            array(
                array(
                    'user_id' => 1,
                    'type' => 'wfh',
                    'start_date' => \Carbon\Carbon::now(),
                    'end_date' => \Carbon\Carbon::now(),
                ),
                array(
                    'user_id' => 2,
                    'type' => 'PTO',
                    'start_date' => \Carbon\Carbon::now(),
                    'end_date' => \Carbon\Carbon::now(),
                )
            )
        );
    }

}