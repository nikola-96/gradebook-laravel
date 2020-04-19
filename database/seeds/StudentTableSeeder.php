<?php

use Illuminate\Database\Seeder;
use App\Gradebook;
use App\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gradebook::all()->each(function(App\Gradebook $gradebook) {	
            $gradebook->students()->saveMany(factory(App\Student::class, 1)->make());
        });
    }
}
