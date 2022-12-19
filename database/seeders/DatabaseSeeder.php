<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::factory()->create([
            'name' => 'Alan',
            'email' => 'alan.mcfarlane@gmail.com',
            'password' => '$2y$10$Y1QxPlJXSl2Wx/3jwnab4OMgmyx2f07TruCW1047Eiz7UsMG5BF0W',
        ]);
    }
}
