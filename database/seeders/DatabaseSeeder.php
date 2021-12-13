<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user1 = User::factory()->create([
            'name' => 'Jhon Doe',
            'username' => 'JhonDoe'
        ]);

        $user2 = User::factory()->create([
            'name' => 'Jeffery Amon',
            'username' => 'JefferyAmon'
        ]);


        \App\Models\Post::factory(10)->create([
                'user_id' => $user1->id,
            ]
        );

        \App\Models\Post::factory(15)->create([
                'user_id' => $user2->id,


            ]
        );
    }
}
