<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50; $i++) { 
            $project = new Project;

            $project->name = $faker->catchPhrase();
            $project->description = $faker->paragraph(2, false );
            $project->technology_used = $faker->words(1, true);
            $project->start_date = $faker->dateTime();

            $project->save();           
        }
    }
}