<?php

use Illuminate\Database\Seeder;
use App\Professor;
use App\Url;
class UrlTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Professor::all()->each(function(Professor $professor) {
            $professor->urls()->saveMany(factory(Url::class, 2)->make());
        });
    }
}
