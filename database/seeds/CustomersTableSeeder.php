<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->delete();

        $customers = array(
          array(
            'name' => 'Mikeys Smokehouse',
          ),
          array(
            'name' => 'JJ Auto Garage',
          ),
          array(
            'name' => 'OSU Medical Center',
          ),
        );

        foreach($customers as &$customer) {
          $customer['created_at'] = Carbon\Carbon::now();
          $customer['updated_at'] = Carbon\Carbon::now();
        }
        DB::table('customers')->insert($customers);
    }
}
