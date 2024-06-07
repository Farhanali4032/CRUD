<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\City;
use App\Models\Deparment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class students extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $students = [
        [
            'name' => 'farhan',
            'city' => '3',
            'department_id' => '2',
        ],
        [
            'name' => 'usman',
            'city' => '5',
            'department_id' => '2',
        ],
        [
            'name' => 'adeel',
            'city' => '3',
            'department_id' => '3',
        ],
        [
            'name' => 'umair',
            'city' => '2',
            'department_id' => '2',
        ],
        [
            'name' => 'zahid',
            'city' => '4',
            'department_id' => '1',
        ],
        [
            'name' => 'kamran',
            'city' => '3',
            'department_id' => '3',
        ],
        [
            'name' => 'ali',
            'city' => '1',
            'department_id' => '2',

        ],
        [
            'name' => 'ahmed',
            'city' => '2',
            'department_id' => '1',
        ]
    ];

    protected $city = [
        [
            'city_name' => 'Khanewal',
        ],
        [
            'city_name' => 'Peshawar',
        ],
        [
            'city_name' => 'Lahore',
        ],
        [
            'city_name' => 'Islamabad',
        ],
        [
            'city_name' => 'Multan',
        ],
        [
            'city_name' => 'Karachi',
        ],
        [
            'city_name' => 'Quetta',
        ],
        [
            'city_name' => 'Sialkot',
        ]
    ];
    protected $department = [
        [
            'department' => 'BSCS',
        ],
        [
            'department' => 'BCSE',
        ],
        [
            'department' => 'BBA',
        ],
        [
            'department' => 'BSIT',
        ],
        [
            'department' => 'BSAI',
        ],
    ];


    public function run()
    {
        foreach ($this->students as $student) {
            Student::create($student);
        }

        foreach ($this->city as $city) {
            City::create($city);
        }
        foreach($this->department as $name){
            Deparment::create($name);
        }
    }
}
