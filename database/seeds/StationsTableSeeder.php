<?php

use App\Model\Branch;
use App\Model\Station;
use Illuminate\Database\Seeder;

class StationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Station::first()) {
            Station::query()->delete();
        }

        $branches = Branch::all();

        $redBranch = $branches->get(0);

        $redBranchStations = [
            [
                'name' => 'Холодная гора'
            ],
            [
                'name' => 'Южный вокзал'
            ],
            [
                'name' => 'Центральный рынок'
            ],
            [
                'name' => 'Площадь Конституции'
            ],
            [
                'name' => 'Проспект Гагарина'
            ],
            [
                'name' => 'Спортивная'
            ],
            [
                'name' => 'Завод имени Малышева'
            ],
            [
                'name' => 'Московский проспект'
            ],
            [
                'name' => 'Дворец Спорта'
            ],
            [
                'name' => 'Армейская'
            ],
            [
                'name' => 'Имени О.С. Масельского'
            ],
            [
                'name' => 'Тракторный завод'
            ],
            [
                'name' => 'Индустриальная'
            ]
        ];

        foreach ($redBranchStations as $station) {
            Station::create($station)->branch()->associate($redBranch)->save();
        }

        $blueBranch = $branches->get(1);

        $blueBranchStations = [
            [
                'name' => 'Исторический музей'
            ],
            [
                'name' => 'Университет'
            ],
            [
                'name' => 'Пушкинская'
            ],
            [
                'name' => 'Киевская'
            ],
            [
                'name' => 'Академика Барабашова'
            ],
            [
                'name' => 'Академика Павлова'
            ],
            [
                'name' => 'Студенческая'
            ],
            [
                'name' => 'Героев труда'
            ]
        ];

        foreach ($blueBranchStations as $station) {
            Station::create($station)->branch()->associate($blueBranch)->save();
        }

        $greenBranch = $branches->get(2);

        $greenBranchStations = [
            [
                'name' => 'Метростроителей им. Ващенко'
            ],
            [
                'name' => 'Площадь Восстания'
            ],
            [
                'name' => 'Архитектора Бекетова'
            ],
            [
                'name' => 'Госпром'
            ],
            [
                'name' => 'Научная'
            ],
            [
                'name' => 'Ботанический сад'
            ],
            [
                'name' => '23 Августа'
            ],
            [
                'name' => 'Алексеевская'
            ]
        ];


        foreach ($greenBranchStations as $station) {
            Station::create($station)->branch()->associate($greenBranch)->save();
        }
    }
}
