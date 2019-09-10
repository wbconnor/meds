<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->delete();

        $tasks = array(
          array(
            'description' => 'We use our senior agile workflows to conservatively manage our standpoint expectations.',
            'user_id' => 1,
            'project_id' => 1
          ),
          array(
            'description' => 'Our Next-Generation Alignment solution offers action points a suite of mission critical offerings.',
            'user_id' => 1,
            'project_id' => 2
          ),
          array(
            'description' => 'Iteratively monetizing ethically world-class stakeholders is crucial to our mobile deliverable.',
            'user_id' => 1,
            'project_id' => 3
          ),
        );

        foreach($tasks as &$task) {
          $task['created_at'] = Carbon\Carbon::now();
          $task['updated_at'] = Carbon\Carbon::now();
        }
        DB::table('tasks')->insert($tasks);
    }
}
