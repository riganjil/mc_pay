<?php

use Illuminate\Database\Seeder;

class income_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert(
            [
                [
                    'user_id' => '1',
                    'nominal' => '2000000',
                    'old_balance' => '0',
                    'category_id' => '4',
                    'description' => 'bonus'
                ],
                [
                    'user_id' => '1',
                    'nominal' => '1000000',
                    'old_balance' => '2000000',
                    'category_id' => '4',
                    'description' => 'bonus'
                ],
                [
                    'user_id' => '1',
                    'nominal' => '10000',
                    'old_balance' => '3000000',
                    'category_id' => '1',
                    'description' => 'makan siang'
                ],
                [
                    'user_id' => '1',
                    'nominal' => '15000',
                    'old_balance' => '2990000',
                    'category_id' => '1',
                    'description' => 'makan malam'
                ],
            ]
        );
    }
}
