<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Michael',
        //     'username' => 'wazabi',
        //     'email' => 'mail@example.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10)
        // ]);

        // Post::factory(100)
        //     ->recycle(User::factory(5)->create())
        //     ->recycle(Category::factory(2)->create())
        // ->create();

        Post::factory(1000)->recycle([
            User::factory(5)->create(),
            Category::factory(2)->create()
        ])->create();
    }
}
