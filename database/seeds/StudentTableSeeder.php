<?php

use Illuminate\Database\Seeder;
use App\Gradebook;
use App\Student;
use App\Professor;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Student::class, 30)->create();
    }
}
