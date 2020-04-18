<?php
use Illuminate\Database\Seeder;

use App\Comment;
use App\Gradebook;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Gradebook::all()->each(function(App\Gradebook $gradebook) {	
            $gradebook->comments()->saveMany(factory(App\Comment::class, 3)->make());
        });
    }
}
