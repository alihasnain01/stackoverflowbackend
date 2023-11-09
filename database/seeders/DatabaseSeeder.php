<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'is_admin' => true
        ]);

        User::create([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'User 2',
            'email' => 'user2@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'User 3',
            'email' => 'user 3@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);

        $this->call([
            TopicSeeder::class,
            IssueSeeder::class,
        ]);
    }
}
