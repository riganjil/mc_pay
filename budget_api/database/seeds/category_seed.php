<?php

use Illuminate\Database\Seeder;

class category_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'name' => 'Food & Beverage',
                    'type' => 'expense',
                ],
                [
                    'name' => 'Phone Bill',
                    'type' => 'expense',
                ],
                [
                    'name' => 'Salary',
                    'type' => 'income',
                ],
                [
                    'name' => 'Bonus',
                    'type' => 'income',
                ]
            ]
        );
    }
}
