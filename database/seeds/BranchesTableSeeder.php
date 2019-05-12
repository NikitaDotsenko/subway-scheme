<?php

use App\Model\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Fluent;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Branch::first()) {
            Branch::query()->delete();
        }

        $branches = [
            [
                'name' => 'Холодногорско-Заводская линия',
                'color' => 'red'
            ],
            [
                'name' => 'Салтовская линия',
                'color' => 'blue'
            ],
            [
                'name' => 'Алексеевская линия',
                'color' => 'green'
            ]
        ];

        foreach ($branches as $branch) {
            \App\Model\Branch::create($branch);
        }

    }
}
