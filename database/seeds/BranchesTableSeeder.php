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
                'name' => __('branches.branch_names.red_branch') . ' ' . __('branches.branch'),
                'color' => 'red'
            ],
            [
                'name' => __('branches.branch_names.blue_branch') . ' ' . __('branches.branch'),
                'color' => 'blue'
            ],
            [
                'name' => __('branches.branch_names.green_branch') . ' ' . __('branches.branch'),
                'color' => 'green'
            ]
        ];

        foreach ($branches as $branch) {
            \App\Model\Branch::create($branch);
        }

    }
}
