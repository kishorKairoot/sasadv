<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('plans')->insert([
            'name' => 'basic',
            'description' => 'The Basic Plan Allows You to Use All Functionality for 1 Month.',
        ]);

        DB::table('plans')->insert([
            'name' => 'plus',
            'description' => 'The Plus Plan Allows You to Use All Functionality for 6 Months.',
        ]);

        DB::table('plans')->insert([
            'name' => 'pro',
            'description' => 'The Pro Plan Allows You to Use All Functionality for 1 Year.',
        ]);

    }
}
