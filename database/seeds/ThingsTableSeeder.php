<?php

use Illuminate\Database\Seeder;

class ThingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('things')->delete();

        $things = array(
          array(
            'message' => 'Meds Message 1',
            'user_id' => 1
          ),
          array(
            'message' => 'Meds Message 2',
            'user_id' => 1
          ),
          array(
            'message' => 'Meds Message 3',
            'user_id' => 1
          ),
        );

        foreach($things as &$thing) {
          $thing['created_at'] = Carbon\Carbon::now();
          $thing['updated_at'] = Carbon\Carbon::now();
        }
        DB::table('things')->insert($things);
    }
}
