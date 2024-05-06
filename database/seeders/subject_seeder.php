<?php

namespace Database\Seeders;

use App\Models\subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class subject_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = ["Mathematics", "Physics", "Chemistry", "Biology", "English", "History", "Geography", "Computer Science", "Art", "Music"];

            foreach($subjects as $subject){
                subject::create([
                    'subject' => $subject
                ]);
            }
    }
}
