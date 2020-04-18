<?php

use Illuminate\Database\Seeder;


class GradebookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Professor::all()->each(function(App\Professor $professor) {	
            $professor->gradebook()->saveMany(factory(App\Gradebook::class, 1)->make());
        });
    }
}
