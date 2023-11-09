<?php

namespace Database\Seeders;

use App\Models\Issues;
use Database\Factories\IssueFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Issue;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Issue::factory(1000)->create();
    }
}
