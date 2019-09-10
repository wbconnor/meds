<?php

use Illuminate\Database\Seeder;

class TaskUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_users')->delete();

        $task_users = array(
          array(
            'user_id' => 1,
            'task_id' => 1,
            'started_at' => Carbon\Carbon::now(),
            'stopped_at' => Carbon\Carbon::now()
          ),
          array(
            'user_id' => 1,
            'task_id' => 2,
            'started_at' => Carbon\Carbon::now(),
            'stopped_at' => Carbon\Carbon::now()
          ),
          array(
            'user_id' => 1,
            'task_id' => 3,
            'started_at' => Carbon\Carbon::now(),
            'stopped_at' => Carbon\Carbon::now()
          ),
        );

        foreach($task_users as &$task_user) {
          $task_user['created_at'] = Carbon\Carbon::now();
          $task_user['updated_at'] = Carbon\Carbon::now();
        }
        DB::table('task_users')->insert($task_users);
    }
}
