<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['Laravel', 'Javascript', 'JQuery', 'React', 'Vue', 'Angular', 'PHP', 'GraphQL', 'Python', 'MySql', 'MongoDB', 'ROR', 'Others'];

        foreach ($names as $name) {
            Topic::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $name === 'Laravel' ? 'Later on all the description will add in the respected category' : 'Later on all the description will add in the respected category Later on all the description will add in the respected category Later on all the description will add in the respected category',
            ]);
        }
    }
}
