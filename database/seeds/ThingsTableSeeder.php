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
            'message' => 'We use our senior agile workflows to conservatively manage our standpoint expectations. In the core competency space, industry is intelligently strategizing its next-generation team players. You need to iteratively virtualise your drivers to increase your industry leader velocity. In the core asset space, industry is reliably synergising its company-wide emerging markets.',
            'user_id' => 1
          ),
          array(
            'message' => 'Our Next-Generation Alignment solution offers action points a suite of mission critical offerings. End-to-end low hanging fruit are becoming holistic synergy experts. Is your user experience prepared for long-term capability growth? Change the way you do business - adopt wholesale standard setters.',
            'user_id' => 1
          ),
          array(
            'message' => 'Iteratively monetizing ethically world-class stakeholders is crucial to our mobile deliverable. Corporate dot-bombs reliably enable seamless team players for our capabilities. Change the way you do business - adopt wholesale user experiences. Proactive capabilities are becoming immersive proposition experts.',
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
