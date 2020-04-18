<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class, 10)->create()
            ->each(function(App\User $user) {
                $professor = new App\Professor();
                $professor->first_name = $user->first_name;
                $professor->last_name = $user->last_name;

                $user->professor()->save($professor);
            });
    }
}
