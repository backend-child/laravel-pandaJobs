<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();
        $user = User::factory()->create([

            'name' => 'Chima Anazor',
            'email' => 'chima@gmail.com'
        ]);

        Listing::factory(6)->create([

            'user_id' => $user->id
        ]);
        // Listing::create([

        //     "title" => "School Teacher Needed",
        //     "tags" => "House Jobs",
        //     "company" => "Ola Paints",
        //     "location" => "Lagos, Nigeria",
        //     "email" => "ola@gmail.com",
        //     "website" => "https://www.ola.com",
        //     "description" => "I do all kind of house jobs"
        // ]);
        // Listing::create([

        //     "title" => "Painter Needed",
        //     "tags" => "House Jobs",
        //     "company" => "Ola Paints",
        //     "location" => "Lagos, Nigeria",
        //     "email" => "ola@gmail.com",
        //     "website" => "https://www.ola.com",
        //     "description" => "I do all kind of house jobs"
        // ]);
    }
}
