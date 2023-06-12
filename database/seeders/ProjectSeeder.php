<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Project;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){

            $project = new Project();
            $project->title = $faker->sentence(3);
            $project->slug = Str::slug($project->title, '-');
            $project->description = $faker->paragraphs(asText: true); 
            $project->duration = $faker->dateTimeBetween('-6 month', '+6 month');
            $project->start_date = $faker->date();
            $project->end_date = $faker->date();
            $project->project_image = 'placeholders/' . $faker->image('storage/app/public/placeholders/', fullPath: false, category: 'Projects', format: 'jpg', word: $project->title, gray: true);
            $project->project_url = $faker->url();
            $project->project_source_code = $faker->url();

            $project->save();
        };
    }
}
