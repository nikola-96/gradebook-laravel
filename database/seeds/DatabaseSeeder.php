<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(UrlTableSeeder::class);
        $this->call(GradebookTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(StudentTableSeeder::class);
    }
}
