<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->delete();

        $projects = array(
          array(
            'name' => 'Make online menu more user friendly',
            'description' => 'Key players will take ownership of their siloes by strategically integrating unparalleled capabilities.',
            'user_id' => 1,
            'customer_id' => 1
          ),
          array(
            'name' => 'Show user reviews because customers actually like us',
            'description' => 'We aim to effectively align our proposition by proactively virtualising our actionable best-in-class dot-bombs.',
            'user_id' => 1,
            'customer_id' => 2
          ),
          array(
            'name' => 'Openly show all of our patients medical history becuase we believe transparency',
            'description' => 'Going forward, our knowledge transfer user experience will deliver value to bandwidths.',
            'user_id' => 1,
            'customer_id' => 3
          ),
        );

        foreach($projects as &$project) {
          $project['created_at'] = Carbon\Carbon::now();
          $project['updated_at'] = Carbon\Carbon::now();
        }
        DB::table('projects')->insert($projects);
    }
}
